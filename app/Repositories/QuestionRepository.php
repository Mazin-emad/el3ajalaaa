<?php

namespace App\Repositories;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Question;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function filteredPaginated(array $filters): LengthAwarePaginator
    {
        /*
         * Use a DB JOIN between questions, assessments and dimensions
         * to retrieve assessment title and dimension name in a single query,
         * avoiding the N+1 problem that the previous with() approach caused.
         */
        $query = DB::table('questions as q')
            ->join('assessments as a', 'a.id', '=', 'q.assessment_id')
            ->leftJoin('dimensions as d', 'd.id', '=', 'q.dimension_id')
            ->whereNull('a.deleted_at')
            ->whereNull('q.deleted_at')
            ->select([
                'q.id',
                'q.text_ar',
                'q.assessment_id',
                'q.dimension_id',
                'q.order_index',
                'q.is_reversed',
                'q.created_at',
                'a.title_ar as assessment_title',
                'd.name_ar  as dimension_name',
            ])
            ->selectSub(
                DB::table('answer_options')->whereNull('deleted_at')->whereColumn('answer_options.question_id', 'q.id')->selectRaw('COUNT(*)'),
                'answer_options_count'
            );

        if (! empty($filters['assessment_id'])) {
            $query->where('q.assessment_id', $filters['assessment_id'])
                ->orderBy('q.order_index');
        } else {
            $query->orderByDesc('q.created_at');
        }

        if (! empty($filters['dimension_id'])) {
            $query->where('q.dimension_id', $filters['dimension_id']);
        }

        if (! empty($filters['search'])) {
            $query->where('q.text_ar', 'like', '%'.$filters['search'].'%');
        }

        $perPage = $filters['per_page'] ?? 25;

        if ($perPage === 'all' || $perPage === 'الكل') {
            $total = $query->count();
            $perPage = $total > 0 ? $total : 25;
        } else {
            $perPage = in_array((int) $perPage, [25, 50, 100]) ? (int) $perPage : 25;
        }

        return $query->paginate($perPage);
    }

    public function byAssessment(Assessment $assessment): Collection
    {
        return $assessment->questions()
            ->with('answerOptions')
            ->orderBy('order_index')
            ->get();
    }

    public function create(array $data, array $options): Question
    {
        $question = Question::create([
            'assessment_id' => $data['assessment_id'],
            'dimension_id' => $data['dimension_id'] ?? null,
            'text_ar' => $data['text_ar'],
            'order_index' => Question::where('assessment_id', $data['assessment_id'])->count(),
            'is_reversed' => $data['is_reversed'] ?? false,
        ]);

        foreach ($options as $index => $opt) {
            AnswerOption::create([
                'question_id' => $question->id,
                'label_ar' => $opt['label_ar'],
                'score_value' => $opt['score_value'],
                'order_index' => $opt['order_index'] ?? $index,
            ]);
        }

        return $question;
    }

    public function update(Question $question, array $data): Question
    {
        $question->update($data);

        return $question->fresh();
    }

    public function delete(Question $question): void
    {
        DB::transaction(function () use ($question) {
            $question->answerOptions()->delete();
            $question->delete();
        });
    }

    public function bulkDelete(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            $questions = Question::whereIn('id', $ids)->get();
            foreach ($questions as $q) {
                $q->answerOptions()->delete();
                $q->delete();
            }
        });
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            Question::where('id', $id)->update(['order_index' => $index]);
        }
    }

    public function bulkAssignDimension(array $ids, ?string $dimensionId): void
    {
        Question::whereIn('id', $ids)->update(['dimension_id' => $dimensionId]);
    }

    public function assignDimension(Question $question, ?string $dimensionId): Question
    {
        $question->update(['dimension_id' => $dimensionId]);

        return $question->fresh();
    }

    public function bulkImport(array $data): int
    {
        $defaultOptions = [
            ['label_ar' => 'نعم',        'score_value' => 2, 'order_index' => 0],
            ['label_ar' => 'إلى حد ما', 'score_value' => 1, 'order_index' => 1],
            ['label_ar' => 'لا',         'score_value' => 0, 'order_index' => 2],
        ];

        $lines = $data['lines'];
        $baseIndex = Question::where('assessment_id', $data['assessment_id'])->count();
        $count = 0;

        foreach ($lines as $offset => $line) {
            if (empty($line)) {
                continue;
            }

            $question = Question::create([
                'assessment_id' => $data['assessment_id'],
                'dimension_id' => $data['dimension_id'] ?? null,
                'text_ar' => $line,
                'order_index' => $baseIndex + $offset,
            ]);

            foreach ($defaultOptions as $opt) {
                AnswerOption::create(array_merge($opt, ['question_id' => $question->id]));
            }

            $count++;
        }

        return $count;
    }
}
