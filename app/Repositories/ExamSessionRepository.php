<?php

namespace App\Repositories;

use App\Models\ExamSession;
use App\Repositories\Contracts\ExamSessionRepositoryInterface;

class ExamSessionRepository implements ExamSessionRepositoryInterface
{
    public function findInProgress(string $userId, string $assessmentId): ?ExamSession
    {
        return ExamSession::where('user_id', $userId)
            ->where('assessment_id', $assessmentId)
            ->where('status', 'in_progress')
            ->first();
    }

    public function create(array $data): ExamSession
    {
        return ExamSession::create($data);
    }

    public function update(ExamSession $session, array $data): ExamSession
    {
        $session->update($data);

        return $session->fresh();
    }
}
