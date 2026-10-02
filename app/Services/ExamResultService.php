<?php

namespace App\Services;

use App\Models\DimensionScore;
use App\Models\ExamSession;
use App\Models\Result;
use App\Services\Result\DimensionInterpreter;
use App\Services\Result\RecommendationSelector;
use App\Services\Result\ResultFormatter;
use App\Services\Result\ScoreCalculator;
use Carbon\Carbon;

class ExamResultService
{
    public function __construct(
        private readonly ScoreCalculator $scoreCalculator,
        private readonly RecommendationSelector $recommendationSelector,
        private readonly DimensionInterpreter $dimensionInterpreter,
        private readonly ResultFormatter $resultFormatter
    ) {}

    /**
     * Calculate and persist the result for a completed exam session.
     */
    public function calculate(ExamSession $session): Result
    {
        if ($session->result) {
            return $session->result->load('dimensionScores.dimension.interpretations');
        }

        $session->load([
            'assessment.questions.answerOptions',
            'assessment.dimensions.interpretations',
            'assessment.recommendations',
            'userAnswers',
        ]);

        $assessment = $session->assessment;

        // 1. Calculate Scores
        $scoreData = $this->scoreCalculator->calculate($session);

        // 2. Select Recommendation
        $recommendation = $this->recommendationSelector->select($assessment, $scoreData);
        $level = $recommendation ? $recommendation->level : null;

        // 3. Persist Result
        $result = Result::create([
            'session_id' => $session->id,
            'total_score' => $scoreData['total_score'],
            'max_possible_score' => $scoreData['max_score'],
            'level' => $level,
            'calculated_at' => Carbon::now(),
        ]);

        // 4. Persist Dimension Scores with Interpretation
        foreach ($scoreData['dimensions'] as $dimData) {
            $dimension = $assessment->dimensions->firstWhere('id', $dimData['dimension_id']);
            $interp = $this->dimensionInterpreter->interpret($dimension, $dimData['score']);
            
            DimensionScore::create([
                'result_id' => $result->id,
                'dimension_id' => $dimData['dimension_id'],
                'score' => $dimData['score'],
                'max_score' => $dimData['max_score'],
                'level' => $interp ? $interp->level : 'medium',
            ]);
        }

        $session->update([
            'status' => 'completed',
            'completed_at' => Carbon::now(),
        ]);

        return $result->load('dimensionScores.dimension.interpretations');
    }

    /**
     * Get the result formatted as a clean structured array (JSON ready).
     */
    public function getFormattedResult(ExamSession $session): array
    {
        $result = $session->result;

        if (! $result) {
            $result = $this->calculate($session);
        } else {
            $result->load('dimensionScores.dimension.interpretations');
        }

        $assessment = $session->assessment()->with(['recommendations'])->first();
        if (! $assessment) {
            abort(404, 'المقياس المرتبط بهذه الجلسة غير موجود. ربما تمت إعادة تهيئة قاعدة البيانات.');
        }
        $recommendation = $assessment->recommendations->where('level', $result->level)->first();

        return $this->resultFormatter->format($assessment, $result, $recommendation);
    }
}
