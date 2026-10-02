<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AssessmentRepositoryInterface
{
    /**
     * Return paginated list of assessments with questions/dimensions counts.
     */
    public function paginated(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    /**
     * Find an assessment and eager-load all nested relations needed for the show page.
     */
    public function findWithRelations(string $id): Assessment;

    /**
     * Create a new assessment and return it.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Assessment;

    /**
     * Update an assessment with the given attributes.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Assessment $assessment, array $data): Assessment;

    /**
     * Delete an assessment.
     */
    public function delete(Assessment $assessment): void;

    /**
     * Toggle the is_active flag.
     */
    public function toggle(Assessment $assessment): Assessment;
}
