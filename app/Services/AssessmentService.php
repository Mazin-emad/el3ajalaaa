<?php

namespace App\Services;

use App\Models\Assessment;
use App\Repositories\Contracts\AssessmentRepositoryInterface;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AssessmentService
{
    public function __construct(
        private readonly AssessmentRepositoryInterface $assessments,
        private readonly DimensionRepositoryInterface $dimensions,
    ) {}

    public function list(array $filters = []): LengthAwarePaginator
    {
        return $this->assessments->paginated($filters);
    }

    public function getForManagement(string $id): Assessment
    {
        return $this->assessments->findWithRelations($id);
    }

    /**
     * Create an assessment along with its initial dimensions.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Assessment
    {
        $assessment = $this->assessments->create([
            'title_ar' => $data['title_ar'],
            'category' => $data['category'],
            'description_ar' => $data['description_ar'] ?? null,
            'time_limit_min' => $data['time_limit_min'] ?? null,
            'created_by' => auth()->id(),
        ]);

        if (! empty($data['dimensions'])) {
            foreach ($data['dimensions'] as $index => $dim) {
                $this->dimensions->create([
                    'assessment_id' => $assessment->id,
                    'name_ar' => $dim['name_ar'],
                    'max_score' => $dim['max_score'],
                    'order_index' => $index,
                ]);
            }
        }

        return $assessment;
    }

    /**
     * Update basic assessment fields.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Assessment $assessment, array $data): Assessment
    {
        return $this->assessments->update($assessment, $data);
    }

    /**
     * Update assessment settings (includes is_active flag).
     *
     * @param  array<string, mixed>  $data
     */
    public function updateSettings(Assessment $assessment, array $data): Assessment
    {
        return $this->assessments->update($assessment, $data);
    }

    public function delete(Assessment $assessment): void
    {
        $this->assessments->delete($assessment);
    }

    public function toggle(Assessment $assessment): Assessment
    {
        return $this->assessments->toggle($assessment);
    }
}
