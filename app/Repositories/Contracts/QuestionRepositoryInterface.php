<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\Question;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface QuestionRepositoryInterface
{
    /**
     * Return a paginated, filtered list of questions.
     * Uses DB JOINs to fetch assessment and dimension names efficiently.
     *
     * @param  array<string, mixed>  $filters  Keys: assessment_id, dimension_id, search, per_page
     */
    public function filteredPaginated(array $filters): LengthAwarePaginator;

    /**
     * Get all questions for an assessment with their answer options.
     */
    public function byAssessment(Assessment $assessment): Collection;

    /**
     * Create a question together with its answer options.
     *
     * @param  array<string, mixed>  $data
     * @param  array<int, array<string, mixed>>  $options
     */
    public function create(array $data, array $options): Question;

    /**
     * Update the question text.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Question $question, array $data): Question;

    /**
     * Delete a single question.
     */
    public function delete(Question $question): void;

    /**
     * Delete multiple questions by IDs.
     *
     * @param  array<int, string>  $ids
     */
    public function bulkDelete(array $ids): void;

    /**
     * Reorder questions by providing an ordered array of UUIDs.
     *
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void;

    /**
     * Assign a dimension to multiple questions.
     *
     * @param  array<int, string>  $ids
     */
    public function bulkAssignDimension(array $ids, ?string $dimensionId): void;

    /**
     * Assign a dimension to a single question.
     */
    public function assignDimension(Question $question, ?string $dimensionId): Question;

    /**
     * Bulk-import questions from plain text lines with default answer options.
     *
     * @param  array<string, mixed>  $data  Keys: assessment_id, dimension_id, lines
     * @return int Number of questions created
     */
    public function bulkImport(array $data): int;
}
