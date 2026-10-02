<?php

namespace App\Repositories;

use App\Models\Assessment;
use App\Models\Dimension;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DimensionRepository implements DimensionRepositoryInterface
{
    public function byAssessment(Assessment $assessment): Collection
    {
        return $assessment->dimensions()
            ->withCount('questions')
            ->orderBy('order_index')
            ->get();
    }

    public function create(array $data): Dimension
    {
        return Dimension::create($data);
    }

    public function update(Dimension $dimension, array $data): Dimension
    {
        $dimension->update($data);

        return $dimension->fresh();
    }

    public function delete(Dimension $dimension): void
    {
        // Unlink questions so they are not orphaned
        $dimension->questions()->update(['dimension_id' => null]);
        $dimension->delete();
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            Dimension::where('id', $id)->update(['order_index' => $index]);
        }
    }

    public function upsertInterpretations(Dimension $dimension, array $data): void
    {
        foreach (['high', 'medium', 'low'] as $level) {
            $dimension->interpretations()->updateOrCreate(
                ['level' => $level],
                [
                    'interpretation_text_ar' => $data['interpretations'][$level],
                    'high_threshold' => $data['high_threshold'],
                    'low_threshold' => $data['low_threshold'],
                ]
            );
        }
    }
}
