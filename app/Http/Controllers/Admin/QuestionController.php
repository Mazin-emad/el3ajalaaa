<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BulkStoreQuestionsRequest;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\AssessmentService;
use App\Services\QuestionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QuestionController extends Controller
{
    public function __construct(
        private readonly QuestionService $questionService,
        private readonly AssessmentService $assessmentService,
    ) {}

    public function index(Request $request): View
    {
        $assessments = Assessment::with('dimensions')->orderBy('title_ar')->get();

        $questions = $this->questionService->filteredList($request->only([
            'assessment_id',
            'dimension_id',
            'search',
            'per_page',
        ]));

        return view('admin.questions.index', compact('questions', 'assessments'));
    }

    public function store(StoreQuestionRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $question = $this->questionService->create($validated, $validated['options']);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة السؤال.',
            'id' => $question->id,
        ]);
    }

    public function bulkStore(BulkStoreQuestionsRequest $request): JsonResponse
    {
        $count = $this->questionService->bulkImport($request->validated());

        return response()->json(['success' => true, 'message' => "تم استيراد $count سؤال بنجاح."]);
    }

    public function byAssessment(Assessment $assessment): JsonResponse
    {
        $questions = $this->questionService->byAssessment($assessment);

        return response()->json($questions);
    }

    public function update(Request $request, Question $question): JsonResponse
    {
        $request->validate(['text_ar' => 'sometimes|string', 'is_reversed' => 'sometimes|boolean']);
        $this->questionService->update($question, $request->only(['text_ar', 'is_reversed']));

        return response()->json(['success' => true, 'message' => 'تم تحديث السؤال.']);
    }

    public function destroy(Question $question): JsonResponse
    {
        $this->questionService->delete($question);

        return response()->json(['success' => true, 'message' => 'تم حذف السؤال.']);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'uuid']);
        $count = $this->questionService->bulkDelete($request->ids);

        return response()->json(['success' => true, 'message' => "تم حذف $count سؤال."]);
    }

    public function reorder(Request $request): JsonResponse
    {
        $request->validate(['order' => 'required|array', 'order.*' => 'uuid']);
        $this->questionService->reorder($request->order);

        return response()->json(['success' => true]);
    }

    public function assignDimension(Request $request, Question $question): JsonResponse
    {
        $request->validate(['dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL']);
        $this->questionService->assignDimension($question, $request->dimension_id ?: null);

        return response()->json(['success' => true, 'message' => 'تم تحديد البُعد.']);
    }

    public function bulkAssignDimension(Request $request): JsonResponse
    {
        $request->validate([
            'ids' => 'required|array', 
            'ids.*' => 'uuid',
            'dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL'
        ]);
        $this->questionService->bulkAssignDimension($request->ids, $request->dimension_id ?: null);

        return response()->json(['success' => true, 'message' => 'تم تعيين البُعد للأسئلة المحددة.']);
    }

    /**
     * Import questions from CSV for an assessment.
     */
    public function importCsv(Request $request, Assessment $assessment): JsonResponse
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');

        try {
            $count = $this->questionService->importFromCsv($assessment, $file->getRealPath());

            return response()->json([
                'success' => true,
                'message' => "تم استيراد $count سؤال بنجاح وتحديث الأبعاد المعنية.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء الاستيراد: '.$e->getMessage(),
            ], 422);
        }
    }

    /**
     * Download CSV template for question importing.
     */
    public function downloadTemplate(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="questions_import_template.csv"',
        ];

        return response()->streamDownload(function () {
            $output = fopen('php://output', 'w');
            fwrite($output, "\xEF\xBB\xBF"); // UTF-8 BOM
            fputcsv($output, ['اسم البعد', 'نص السؤال', 'معكوس', 'الخيارات']);
            fputcsv($output, ['الوعي بالذات', 'أعرف نقاط قوتي بوضوح.', '0', 'نعم:2|إلى حد ما:1|لا:0']);
            fputcsv($output, ['الوعي بالذات', 'أستطيع تحديد نقاط الضعف التي أحتاج إلى تطويرها.', '0', '']);
            fputcsv($output, ['الوعي الانفعالي', 'أشعر بالقلق أو التوتر بسهولة عند مواجهة المشكلات.', '1', 'نعم:0|إلى حد ما:1|لا:2']);
            fclose($output);
        }, 'questions_import_template.csv', $headers);
    }
}
