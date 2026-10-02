<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Services\IconService;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function __construct(
        private readonly IconService $iconService,
    ) {}

    public function index()
    {
        $icons = $this->iconService->getGroupedByCategory();

        return view('admin.icons.index', compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:certificates,programs,plan_30_days,assessments,system',
            'icon_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500', // max 500KB
        ], [
            'icon_file.max' => 'حجم الأيقونة يجب أن لا يتجاوز 500 كيلوبايت لضمان سرعة التقرير.',
            'icon_file.image' => 'يجب اختيار ملف صورة صالح.',
        ]);

        if ($request->hasFile('icon_file')) {
            $this->iconService->store(
                $request->name,
                $request->category,
                $request->file('icon_file')
            );

            return back()->with('success', 'تم إضافة الأيقونة بنجاح.');
        }

        return back()->withErrors(['icon_file' => 'فشل في رفع الأيقونة.']);
    }

    public function destroy(Icon $icon)
    {
        $this->iconService->delete($icon);

        return back()->with('success', 'تم حذف الأيقونة بنجاح.');
    }
}
