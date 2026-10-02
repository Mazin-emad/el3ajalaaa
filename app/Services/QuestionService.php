<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Question;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepositoryInterface $questions,
    ) {}

    /**
     * @param  array<string, mixed>  $filters
     */
    public function filteredList(array $filters): LengthAwarePaginator
    {
        return $this->questions->filteredPaginated($filters);
    }

    public function byAssessment(Assessment $assessment): Collection
    {
        return $this->questions->byAssessment($assessment);
    }

    /**
     * @param  array<string, mixed>  $data
     * @param  array<int, array<string, mixed>>  $options
     */
    public function create(array $data, array $options): Question
    {
        return $this->questions->create($data, $options);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Question $question, array $data): Question
    {
        $updateData = array_intersect_key($data, array_flip(['text_ar', 'is_reversed', 'dimension_id']));

        return $this->questions->update($question, $updateData);
    }

    public function delete(Question $question): void
    {
        $this->questions->delete($question);
    }

    /**
     * @param  array<int, string>  $ids
     */
    public function bulkDelete(array $ids): int
    {
        $count = count($ids);
        $this->questions->bulkDelete($ids);

        return $count;
    }

    /**
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void
    {
        $this->questions->reorder($orderedIds);
    }

    /**
     * @param  array<int, string>  $ids
     */
    public function bulkAssignDimension(array $ids, ?string $dimensionId): void
    {
        $this->questions->bulkAssignDimension($ids, $dimensionId);
    }

    public function assignDimension(Question $question, ?string $dimensionId): Question
    {
        return $this->questions->assignDimension($question, $dimensionId);
    }

    /**
     * Bulk-import questions from raw text (one per line).
     *
     * @param  array<string, mixed>  $data  Keys: assessment_id, dimension_id, questions_text
     * @return int Number of questions created
     */
    public function bulkImport(array $data): int
    {
        $lines = array_filter(
            array_map('trim', explode("\n", $data['questions_text']))
        );

        return $this->questions->bulkImport([
            'assessment_id' => $data['assessment_id'],
            'dimension_id' => $data['dimension_id'] ?? null,
            'lines' => array_values($lines),
        ]);
    }

    /**
     * Import questions from a CSV file.
     */
    public function importFromCsv(Assessment $assessment, string $filePath): int
    {
        if (($handle = fopen($filePath, 'r')) === false) {
            throw new \RuntimeException('تعذر فتح ملف CSV.');
        }

        $rowCount = 0;
        $isFirst = true;

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            if (empty($row) || count($row) < 2) {
                continue;
            }

            // Skip header row if present
            if ($isFirst) {
                $isFirst = false;
                $firstCol = trim($row[0]);
                if (
                    str_contains($firstCol, 'dimension') ||
                    str_contains($firstCol, 'البعد') ||
                    str_contains($firstCol, 'بُعد') ||
                    str_contains(trim($row[1]), 'question') ||
                    str_contains(trim($row[1]), 'السؤال')
                ) {
                    continue;
                }
            }

            $dimName = trim($row[0] ?? '');
            $qText = trim($row[1] ?? '');

            if (empty($qText)) {
                continue;
            }

            $isReversed = filter_var(trim($row[2] ?? '0'), FILTER_VALIDATE_BOOLEAN) || trim($row[2] ?? '0') === '1';
            $optionsStr = trim($row[3] ?? '');

            // Get or create dimension if dimName is provided
            $dimensionId = null;
            if (! empty($dimName)) {
                $dimension = $assessment->dimensions()->firstOrCreate(
                    ['name_ar' => $dimName],
                    [
                        'max_score' => 0,
                        'order_index' => $assessment->dimensions()->count(),
                    ]
                );
                $dimensionId = $dimension->id;
            }

            // Parse options
            $options = [];
            if (! empty($optionsStr)) {
                $optParts = explode('|', $optionsStr);
                foreach ($optParts as $idx => $part) {
                    $pair = explode(':', $part);
                    $label = trim($pair[0] ?? '');
                    $score = intval(trim($pair[1] ?? '0'));
                    if ($label !== '') {
                        $options[] = [
                            'label_ar' => $label,
                            'score_value' => $score,
                            'order_index' => $idx,
                        ];
                    }
                }
            }

            // Default options
            if (empty($options)) {
                $options = [
                    ['label_ar' => 'نعم',        'score_value' => $isReversed ? 0 : 2, 'order_index' => 0],
                    ['label_ar' => 'إلى حد ما', 'score_value' => 1,                   'order_index' => 1],
                    ['label_ar' => 'لا',         'score_value' => $isReversed ? 2 : 0, 'order_index' => 2],
                ];
            }

            $this->questions->create([
                'assessment_id' => $assessment->id,
                'dimension_id' => $dimensionId,
                'text_ar' => $qText,
                'is_reversed' => $isReversed,
            ], $options);

            $rowCount++;
        }

        fclose($handle);

        // Update dimensions max_scores
        foreach ($assessment->dimensions as $dim) {
            $dimQuestions = $dim->questions()->with('answerOptions')->get();
            $dimMax = $dimQuestions->sum(
                fn ($q) => $q->answerOptions->max('score_value') ?? 0
            );
            $dim->update(['max_score' => $dimMax]);
        }

        return $rowCount;
    }
}
