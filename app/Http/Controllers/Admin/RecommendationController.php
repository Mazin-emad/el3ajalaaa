<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRecommendationRequest;
use App\Models\Assessment;
use App\Models\Recommendation;
use App\Services\RecommendationService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RecommendationController extends Controller
{
    public function __construct(
        private readonly RecommendationService $recommendationService,
    ) {}

    public function index(): View
    {
        $recommendations = $this->recommendationService->allGrouped();
        $assessments = Assessment::orderBy('title_ar')->get();
        $icons = \App\Models\Icon::all()->groupBy('category');

        return view('admin.recommendations.index', compact('recommendations', 'assessments', 'icons'));
    }

    public function store(StoreRecommendationRequest $request): JsonResponse
    {
        $rec = $this->recommendationService->upsert($request->validated());

        return response()->json(['success' => true, 'message' => 'تم حفظ التوصية.', 'id' => $rec->id]);
    }

    public function destroy(Recommendation $recommendation): JsonResponse
    {
        $this->recommendationService->delete($recommendation);

        return response()->json(['success' => true, 'message' => 'تم حذف التوصية.']);
    }
}
