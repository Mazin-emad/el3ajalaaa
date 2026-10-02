<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDimensionRequest;
use App\Http\Requests\Admin\StoreInterpretationsRequest;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Services\DimensionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    public function __construct(
        private readonly DimensionService $dimensionService,
    ) {}

    public function byAssessment(Assessment $assessment): JsonResponse
    {
        $dimensions = $this->dimensionService->byAssessment($assessment);

        return response()->json($dimensions);
    }

    public function store(StoreDimensionRequest $request, Assessment $assessment): JsonResponse
    {
        $dimension = $this->dimensionService->create($assessment, $request->validated());

        return response()->json([
            'success' => true,
            'dimension' => $dimension,
            'message' => 'تم إضافة البُعد بنجاح.',
        ]);
    }

    public function update(StoreDimensionRequest $request, Dimension $dimension): JsonResponse
    {
        $this->dimensionService->update($dimension, $request->validated());

        return response()->json(['success' => true, 'message' => 'تم تحديث البُعد.']);
    }

    public function destroy(Dimension $dimension): JsonResponse
    {
        $this->dimensionService->delete($dimension);

        return response()->json(['success' => true, 'message' => 'تم حذف البُعد بنجاح.']);
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order' => 'required|array',
            'order.*' => 'required|uuid|exists:dimensions,id,deleted_at,NULL',
        ]);

        $this->dimensionService->reorder($data['order']);

        return response()->json(['success' => true, 'message' => 'تم إعادة ترتيب الأبعاد.']);
    }

    public function storeInterpretations(StoreInterpretationsRequest $request, Dimension $dimension): JsonResponse
    {
        $this->dimensionService->saveInterpretations($dimension, $request->validated());

        return response()->json(['success' => true, 'message' => 'تم حفظ تفسيرات البُعد بنجاح.']);
    }
}
