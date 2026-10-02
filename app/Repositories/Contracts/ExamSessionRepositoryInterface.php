<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\ExamSession;

interface ExamSessionRepositoryInterface
{
    /**
     * Find an in-progress session for a user and assessment.
     */
    public function findInProgress(string $userId, string $assessmentId): ?ExamSession;

    /**
     * Create a new exam session.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): ExamSession;

    /**
     * Update an exam session with the given attributes.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(ExamSession $session, array $data): ExamSession;
}
