<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;
use App\Models\User;

class PerceptualStylesSeeder extends Seeder
{
    public function run(): void
    {
        $dir = database_path('data/assessments/perceptual_styles');
        $meta = require $dir . '/meta.php';
        
        $adminUser = User::where('role', 'admin')->first() ?? User::first();
        $meta['created_by'] = $adminUser?->id;

        // Delete old version if exists to ensure clean idempotent seed
        $existingList = Assessment::where('report_code', 'REP-PERCEPTUAL')
            ->orWhere('report_code', 'REP-28')
            ->orWhere('title_ar', 'LIKE', '%الأنماط الإدراكية%')
            ->orWhere('scoring_type', 'perceptual_styles')
            ->get();

        foreach ($existingList as $oldAss) {
            $sessions = \App\Models\ExamSession::where('assessment_id', $oldAss->id)->get();
            foreach ($sessions as $s) {
                \App\Models\UserAnswer::where('session_id', $s->id)->forceDelete();
                $res = \App\Models\Result::where('exam_session_id', $s->id)->first();
                if ($res) {
                    \App\Models\DimensionScore::where('result_id', $res->id)->forceDelete();
                    $res->forceDelete();
                }
                $s->forceDelete();
            }
            Recommendation::where('assessment_id', $oldAss->id)->forceDelete();

            $dimIds = Dimension::where('assessment_id', $oldAss->id)->pluck('id');
            \App\Models\DimensionInterpretation::whereIn('dimension_id', $dimIds)->forceDelete();
            Dimension::where('assessment_id', $oldAss->id)->forceDelete();

            $qIds = Question::where('assessment_id', $oldAss->id)->pluck('id');
            AnswerOption::whereIn('question_id', $qIds)->forceDelete();
            Question::where('assessment_id', $oldAss->id)->forceDelete();

            $oldAss->forceDelete();
        }

        $assessment = Assessment::create($meta);

        $dimensions = require $dir . '/dimensions.php';
        foreach ($dimensions as $dimData) {
            $dimension = Dimension::create([
                'assessment_id' => $assessment->id,
                'name_ar' => $dimData['name_ar'],
                'max_score' => $dimData['max_score'],
                'order_index' => $dimData['order_index'],
            ]);

            if (isset($dimData['questions'])) {
                foreach ($dimData['questions'] as $qData) {
                    $question = Question::create([
                        'assessment_id' => $assessment->id,
                        'dimension_id' => $dimension->id,
                        'text_ar' => $qData['text_ar'],
                        'order_index' => $qData['order_index'],
                    ]);

                    if (isset($qData['options'])) {
                        foreach ($qData['options'] as $optData) {
                            AnswerOption::create([
                                'question_id' => $question->id,
                                'label_ar' => $optData['label_ar'],
                                'score_value' => $optData['score_value'],
                                'order_index' => $optData['order_index'],
                            ]);
                        }
                    }
                }
            }
        }

        $recommendations = require $dir . '/recommendations.php';
        foreach ($recommendations as $recData) {
            Recommendation::create([
                'assessment_id' => $assessment->id,
                'level' => $recData['level'],
                'title_ar' => $recData['title_ar'] ?? null,
                'description_ar' => $recData['description_ar'],
                'strengths_ar' => $recData['strengths_ar'] ?? null,
                'development_areas_ar' => $recData['development_areas_ar'] ?? null,
                'how_to_learn_ar' => $recData['how_to_learn_ar'] ?? null,
                'practical_tips_ar' => $recData['practical_tips_ar'] ?? null,
                'certificates_intro_ar' => $recData['certificates_intro_ar'] ?? null,
                'certificates_ar' => $recData['certificates_ar'] ?? null,
                'programs_intro_ar' => $recData['programs_intro_ar'] ?? null,
                'programs_ar' => $recData['programs_ar'] ?? null,
                'programs_outro_ar' => $recData['programs_outro_ar'] ?? null,
                'plan_30_days_intro_ar' => $recData['plan_30_days_intro_ar'] ?? null,
                'plan_30_days_ar' => $recData['plan_30_days_ar'] ?? null,
            ]);
        }
    }
}
