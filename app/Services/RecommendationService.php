<?php

namespace App\Services;

use App\Models\Recommendation;
use App\Repositories\Contracts\RecommendationRepositoryInterface;
use Illuminate\Support\Collection;

class RecommendationService
{
    public function __construct(
        private readonly RecommendationRepositoryInterface $recommendations,
    ) {}

    /**
     * @return Collection<string, Collection<int, Recommendation>>
     */
    public function allGrouped(): Collection
    {
        return $this->recommendations->allGrouped();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function upsert(array $data): Recommendation
    {
        return $this->recommendations->upsert($data);
    }

    public function delete(Recommendation $recommendation): void
    {
        $this->recommendations->delete($recommendation);
    }
}
