<?php

namespace App\Services\Result;

use App\Models\ExamSession;

class ScoreCalculator
{
    /**
     * Calculate raw scores for the overall assessment and individual dimensions.
     * 
     * @return array{
     *   total_score: int, 
     *   max_score: int, 
     *   dimensions: array<array{dimension_id: string, score: int, max_score: int, name: string}>
     * }
     */
    public function calculate(ExamSession $session): array
    {
        $assessment = $session->assessment;
        $answeredByQuestion = $session->userAnswers->keyBy('question_id');

        $totalScore = 0;
        $maxScore = 0;

        foreach ($assessment->questions as $question) {
            $answer = $answeredByQuestion->get($question->id);
            if ($answer) {
                // The score_earned is already accurately recorded during the exam 
                // regardless of whether the question is reversed or not.
                $totalScore += (int)$answer->score_earned;
            }
            $maxScore += (int)($question->answerOptions->max('score_value') ?? 0);
        }

        $dimensionScoresData = [];

        foreach ($assessment->dimensions as $dimension) {
            $dimQuestions = $assessment->questions->where('dimension_id', $dimension->id);
            $dimScore = 0;
            $dimMax = 0;

            foreach ($dimQuestions as $q) {
                $answer = $answeredByQuestion->get($q->id);
                if ($answer) {
                    $dimScore += (int)$answer->score_earned;
                }
                $dimMax += (int)($q->answerOptions->max('score_value') ?? 0);
            }
            
            // Fallback for max score if no options
            $dimMax = $dimMax ?: $dimension->max_score;

            $dimensionScoresData[] = [
                'dimension_id' => $dimension->id,
                'name'         => $dimension->name_ar,
                'score'        => $dimScore,
                'max_score'    => (int)$dimMax,
            ];
        }

        return [
            'total_score' => $totalScore,
            'max_score'   => $maxScore,
            'dimensions'  => $dimensionScoresData,
        ];
    }
}
