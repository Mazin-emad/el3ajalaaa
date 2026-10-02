<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnswerOption;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerOptionController extends Controller
{
    /**
     * Get all options for a specific question.
     */
    public function index(Question $question): JsonResponse
    {
        $options = $question->answerOptions()->orderBy('order_index')->get();
        return response()->json($options);
    }

    /**
     * Store a new answer option for a question.
     */
    public function store(Request $request, Question $question): JsonResponse
    {
        $request->validate([
            'label_ar' => 'required|string|max:255',
            'score_value' => 'required|numeric',
        ]);

        $maxOrder = $question->answerOptions()->max('order_index') ?? -1;

        $option = AnswerOption::create([
            'question_id' => $question->id,
            'label_ar' => $request->label_ar,
            'score_value' => $request->score_value,
            'order_index' => $maxOrder + 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة خيار الإجابة.',
            'option' => $option
        ]);
    }

    /**
     * Update an existing answer option.
     */
    public function update(Request $request, AnswerOption $option): JsonResponse
    {
        $request->validate([
            'label_ar' => 'required|string|max:255',
            'score_value' => 'required|numeric',
        ]);

        $option->update([
            'label_ar' => $request->label_ar,
            'score_value' => $request->score_value,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث خيار الإجابة.'
        ]);
    }

    /**
     * Delete an answer option.
     */
    public function destroy(AnswerOption $option): JsonResponse
    {
        $option->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف خيار الإجابة.'
        ]);
    }

    /**
     * Sync identical options to ALL questions in the same assessment.
     */
    public function syncToAssessment(Request $request, Question $question): JsonResponse
    {
        $assessment = $question->assessment;
        $options = $question->answerOptions()->orderBy('order_index')->get();

        if ($options->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'لا توجد خيارات لنسخها.']);
        }

        $allQuestions = $assessment->questions()->where('id', '!=', $question->id)->get();

        \Illuminate\Support\Facades\DB::transaction(function () use ($allQuestions, $options) {
            foreach ($allQuestions as $q) {
                // Delete existing options
                $q->answerOptions()->delete();
                
                // Duplicate the current question's options
                foreach ($options as $opt) {
                    AnswerOption::create([
                        'question_id' => $q->id,
                        'label_ar' => $opt->label_ar,
                        'score_value' => $opt->score_value,
                        'order_index' => $opt->order_index,
                    ]);
                }
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'تم تعميم الخيارات على جميع أسئلة المقياس بنجاح.'
        ]);
    }
}
