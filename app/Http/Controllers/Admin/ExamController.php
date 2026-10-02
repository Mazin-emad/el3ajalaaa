<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\AssessmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function __construct(
        private readonly AssessmentService $assessmentService,
    ) {}

    public function create(): View
    {
        $assessments = Assessment::orderBy('title_ar')->get();

        return view('admin.exams.create', compact('assessments'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'question_ids' => 'required|array|min:1',
            'question_ids.*' => 'uuid|exists:questions,id,deleted_at,NULL',
        ]);

        $assessment = \Illuminate\Support\Facades\DB::transaction(function () use ($data) {
            $assessment = $this->assessmentService->create([
                'title_ar' => $data['title_ar'],
                'category' => $data['category'],
                'description_ar' => $data['description_ar'] ?? null,
                'time_limit_min' => $data['time_limit_min'] ?? null,
                'dimensions' => [],
            ]);

            // Re-assign chosen questions to this assessment in order
            foreach ($data['question_ids'] as $idx => $qId) {
                Question::where('id', $qId)->update([
                    'assessment_id' => $assessment->id,
                    'order_index' => $idx,
                ]);
            }
            
            return $assessment;
        });

        return response()->json(['success' => true, 'message' => 'تم إنشاء الاختبار.', 'id' => $assessment->id]);
    }
}
