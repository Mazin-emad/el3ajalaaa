<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\UserAnswer;
use App\Repositories\Contracts\ExamSessionRepositoryInterface;
use Carbon\Carbon;

class ExamService
{
    public function __construct(
        private readonly ExamSessionRepositoryInterface $sessions,
        private readonly ExamResultService $resultService,
    ) {}

    /**
     * Start a new exam session (or return an existing in-progress one).
     *
     * Returns either an ExamSession (if resumed) or a newly created ExamSession.
     */
    public function startOrResume(Assessment $assessment, string $userId): array
    {
        $existing = $this->sessions->findInProgress($userId, $assessment->id);

        if ($existing) {
            return ['session' => $existing, 'resumed' => true];
        }

        $session = $this->sessions->create([
            'user_id' => $userId,
            'assessment_id' => $assessment->id,
            'status' => 'in_progress',
            'started_at' => Carbon::now(),
        ]);

        return ['session' => $session, 'resumed' => false];
    }

    /**
     * Load session data for the exam page (assessment + questions + progress).
     *
     * @return array<string, mixed>
     */
    public function getSessionData(ExamSession $session): array
    {
        $assessment = $session->assessment;
        $total = $assessment->questions()->count();
        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        
        $nextQuestion = $assessment->questions()
            ->with('answerOptions')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();
            
        $current = count($answeredIds) + 1;

        return [
            'assessment' => $assessment,
            'nextQuestion' => $nextQuestion,
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Delete the last answer and return the previous question state.
     *
     * @return array<string, mixed>
     */
    public function previousQuestion(ExamSession $session): array
    {
        $lastAnswer = $session->userAnswers()->orderBy('id', 'desc')->first();
        if ($lastAnswer) {
            $lastAnswer->delete();
        }

        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        $total = $session->assessment->questions()->count();
        $answeredCount = count($answeredIds);
        
        $nextQuestion = $session->assessment->questions()
            ->with('answerOptions', 'dimension')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();
            
        $current = $answeredCount + 1;

        if (! $nextQuestion) {
            // Unlikely if we just deleted an answer, but fallback
            $this->resultService->calculate($session);

            return ['is_last' => true, 'redirect' => route('exam.result', $session->id)];
        }

        return [
            'is_last' => false,
            'next_question' => [
                'id' => $nextQuestion->id,
                'text_ar' => $nextQuestion->text_ar,
                'is_reversed' => (bool) $nextQuestion->is_reversed,
                'dimension_name' => $nextQuestion->dimension?->name_ar,
                'options' => $nextQuestion->answerOptions->map(fn ($o) => [
                    'id' => $o->id,
                    'label_ar' => $o->label_ar,
                ]),
            ],
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Submit an answer and return the next question data (or redirect to result).
     *
     * @return array<string, mixed>
     */
    public function submitAnswer(ExamSession $session, string $questionId, string $optionId): array
    {
        // Verify question belongs to this assessment
        $question = $session->assessment->questions()->findOrFail($questionId);

        // Verify option belongs to this question
        $option = $question->answerOptions()->findOrFail($optionId);

        // Upsert answer
        UserAnswer::updateOrCreate(
            ['session_id' => $session->id, 'question_id' => $question->id],
            ['selected_option_id' => $option->id, 'score_earned' => $option->score_value]
        );

        // Find next unanswered question
        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        $total = $session->assessment->questions()->count();
        $answeredCount = count($answeredIds);
        
        $nextQuestion = $session->assessment->questions()
            ->with('answerOptions', 'dimension')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();

        if (! $nextQuestion) {
            $this->resultService->calculate($session);

            return ['is_last' => true, 'redirect' => route('exam.result', $session->id)];
        }

        $current = $answeredCount + 1;

        return [
            'is_last' => false,
            'next_question' => [
                'id' => $nextQuestion->id,
                'text_ar' => $nextQuestion->text_ar,
                'is_reversed' => (bool) $nextQuestion->is_reversed,
                'dimension_name' => $nextQuestion->dimension?->name_ar,
                'options' => $nextQuestion->answerOptions->map(fn ($o) => [
                    'id' => $o->id,
                    'label_ar' => $o->label_ar,
                ]),
            ],
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Get or calculate the result for a completed session.
     *
     * @return array<string, mixed>
     */
    public function getResult(ExamSession $session): array
    {
        return $this->resultService->getFormattedResult($session);
    }
}
