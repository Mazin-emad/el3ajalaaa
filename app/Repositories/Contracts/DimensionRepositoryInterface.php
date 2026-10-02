<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\Dimension;
use Illuminate\Database\Eloquent\Collection;

interface DimensionRepositoryInterface
{
    /**
     * Get all dimensions for an assessment ordered by order_index, with question count.
     */
    public function byAssessment(Assessment $assessment): Collection;

    /**
     * Create a new dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Dimension;

    /**
     * Update a dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Dimension $dimension, array $data): Dimension;

    /**
     * Delete a dimension (unlinks its questions first).
     */
    public function delete(Dimension $dimension): void;

    /**
     * Reorder dimensions by providing an ordered array of UUIDs.
     *
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void;

    /**
     * Upsert dimension interpretations (high / medium / low).
     *
     * @param  array<string, mixed>  $data
     */
    public function upsertInterpretations(Dimension $dimension, array $data): void;
}
