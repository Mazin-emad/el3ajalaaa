<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Dimension;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DimensionService
{
    public function __construct(
        private readonly DimensionRepositoryInterface $dimensions,
    ) {}

    public function byAssessment(Assessment $assessment): Collection
    {
        return $this->dimensions->byAssessment($assessment);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(Assessment $assessment, array $data): Dimension
    {
        return $this->dimensions->create([
            'assessment_id' => $assessment->id,
            'name_ar' => $data['name_ar'],
            'max_score' => $data['max_score'],
            'order_index' => $assessment->dimensions()->count(),
        ]);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Dimension $dimension, array $data): Dimension
    {
        return $this->dimensions->update($dimension, $data);
    }

    public function delete(Dimension $dimension): void
    {
        $this->dimensions->delete($dimension);
    }

    /**
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void
    {
        $this->dimensions->reorder($orderedIds);
    }

    /**
     * Save all three level interpretations for a dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function saveInterpretations(Dimension $dimension, array $data): void
    {
        $this->dimensions->upsertInterpretations($dimension, $data);
    }
}
