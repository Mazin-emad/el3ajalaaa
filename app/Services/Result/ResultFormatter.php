<?php

namespace App\Services\Result;

use App\Models\Assessment;
use App\Models\Recommendation;
use App\Models\Result;

class ResultFormatter
{
    /**
     * Formats the final result API response into a strictly structured format.
     */
    public function format(Assessment $assessment, Result $result, ?Recommendation $recommendation): array
    {
        $response = [
            'result_id' => $result->id,
            'created_at' => clone $result->calculated_at,
            'assessment' => [
                'id' => $assessment->id,
                'title_ar' => $assessment->title_ar,
                'scoring_type' => $assessment->scoring_type,
            ],
            'category' => $assessment->category,
            'total_score' => $result->total_score,
            'max_score' => $result->max_possible_score,
            'level' => $result->level,
            'recommendation' => $recommendation ? $recommendation->description_ar : null,
        ];
        // Use fields directly from Recommendation if available
        $progIntro = $recommendation ? $recommendation->programs_intro_ar : null;
        $progOutro = $recommendation ? $recommendation->programs_outro_ar : null;
        $progText = $recommendation ? $recommendation->programs_ar : null;
        $programs = is_array($progText) ? $this->formatProgramsArray($progText) : $this->formatProgramsArray($this->parseList($progText));
        
        if (!empty($progIntro)) $response['programs_intro'] = $progIntro;
        if (!empty($programs)) $response['programs'] = $programs;
        if (!empty($progOutro)) $response['programs_outro'] = $progOutro;
        
        $certs_ar = $recommendation ? $recommendation->certificates_ar : null;
        $certsIntro = $recommendation ? $recommendation->certificates_intro_ar : null;
        $certificates = is_array($certs_ar) ? $this->formatCertificatesArray($certs_ar) : $this->parseCertificates($certs_ar);
        if (!empty($certsIntro)) $response['certificates_intro'] = $certsIntro;
        if (!empty($certificates)) $response['certificates'] = $certificates;

        $roadmap_ar = $recommendation ? $recommendation->plan_30_days_ar : null;
        $roadmapIntro = $recommendation ? $recommendation->plan_30_days_intro_ar : null;
        $roadmap = is_array($roadmap_ar) ? $roadmap_ar : $this->parseList($roadmap_ar);
        if (!empty($roadmapIntro)) $response['roadmap_intro'] = $roadmapIntro;
        if (!empty($roadmap)) $response['roadmap'] = $roadmap;

        if ($recommendation) {
            if (!empty($recommendation->title_ar)) $response['recommendation_title'] = $recommendation->title_ar;
            if (!empty($recommendation->strengths_ar)) $response['strengths'] = is_array($recommendation->strengths_ar) ? $recommendation->strengths_ar : $this->parseList($recommendation->strengths_ar);
            if (!empty($recommendation->development_areas_ar)) $response['development_areas'] = is_array($recommendation->development_areas_ar) ? $recommendation->development_areas_ar : $this->parseList($recommendation->development_areas_ar);
            if (!empty($recommendation->how_to_learn_ar)) $response['how_to_learn'] = is_array($recommendation->how_to_learn_ar) ? $recommendation->how_to_learn_ar : $this->parseList($recommendation->how_to_learn_ar);
            if (!empty($recommendation->practical_tips_ar)) $response['practical_tips'] = is_array($recommendation->practical_tips_ar) ? $recommendation->practical_tips_ar : $this->parseList($recommendation->practical_tips_ar);
        }

        $dimensions = [];
        $chartLabels = [];
        $chartData = [];

        foreach ($result->dimensionScores as $ds) {
            // Skip the "عام" dimension as it is a fallback placeholder
            if (trim($ds->dimension->name_ar) === 'عام') {
                continue;
            }

            $interp = $ds->dimension->interpretations->where('level', $ds->level)->first();
            $pct = $ds->max_score > 0 ? round(($ds->score / $ds->max_score) * 100) : 0;

            $cleanName = preg_replace('/^المحور\s+\S+[:：]\s*/u', '', $ds->dimension->name_ar);

            $dimensions[] = [
                'id' => $ds->dimension->id,
                'name' => $cleanName,
                'score' => $ds->score,
                'max_score' => $ds->max_score,
                'percentage' => $pct,
                'level' => $ds->level,
                'display_level' => $this->getDisplayLevel($ds->level),
                'interpretation' => $interp ? $interp->interpretation_text_ar : null,
            ];

            // Chart Data using score / max_score
            $chartLabels[] = $cleanName;
            $chartData[] = $pct;
        }

        if (!empty($dimensions)) {
            $response['dimensions'] = $dimensions;
            if (!empty($chartLabels)) {
                $response['chart_data'] = [
                    'labels' => $chartLabels,
                    'data' => $chartData
                ];
            }
        }

        return $response;
    }

    private function parseList(?string $text): array
    {
        if (empty(trim($text ?? ''))) return [];
        // Clean invalid UTF-8 bytes that might cause preg_split to fail
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        $split = preg_split('/[,\n،]+/u', $text);
        if (!is_array($split)) return [];
        
        $items = array_map(function($item) {
            return trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $item));
        }, $split);
        return array_values(array_filter($items, fn($i) => !empty($i)));
    }

    private function getDisplayLevel(string $level): string
    {
        $map = [
            'excellent' => 'متميز',
            'advanced'  => 'متقدم',
            'good'      => 'جيد',
            'average'   => 'متوسط',
            'weak'      => 'ضعيف',
            // Legacy/alternative keys
            'high'      => 'مرتفع',
            'medium'    => 'متوسط',
            'low'       => 'منخفض',
        ];
        
        return $map[$level] ?? $level;
    }

    private function parseCertificates(?string $text): array
    {
        if (empty($text)) return [];
        $items = array_map('trim', preg_split('/[,\n،]+/u', $text));
        $items = array_values(array_filter($items, fn($i) => !empty($i)));
        
        return $this->formatCertificatesArray($items);
    }

    private function formatCertificatesArray(array $items): array
    {
        return array_map(function($cert) {
            if (is_array($cert)) {
                return $cert;
            }
            if (is_object($cert)) {
                return (array) $cert;
            }
            return [
                'title' => trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $cert)),
                'description' => 'شهادة احترافية'
            ];
        }, array_filter($items));
    }

    private function formatProgramsArray(array $items): array
    {
        return array_map(function($prog) {
            if (is_array($prog)) {
                return $prog;
            }
            if (is_object($prog)) {
                return (array) $prog;
            }
            return [
                'title' => trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $prog)),
                'icon' => 'bi-journal-bookmark'
            ];
        }, array_filter($items));
    }
}
