<?php

namespace App\Repositories\Contracts;

use App\Models\Recommendation;
use Illuminate\Support\Collection;

interface RecommendationRepositoryInterface
{
    /**
     * Get all recommendations joined with assessment names, grouped by assessment_id.
     *
     * @return Collection<string, Collection<int, Recommendation>>
     */
    public function allGrouped(): Collection;

    /**
     * Upsert a recommendation (update-or-create by assessment_id + level).
     *
     * @param  array<string, mixed>  $data
     */
    public function upsert(array $data): Recommendation;

    /**
     * Delete a recommendation.
     */
    public function delete(Recommendation $recommendation): void;
}
