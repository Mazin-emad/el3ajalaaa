<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|min:0',
            'rating' => 'nullable|numeric|min:1|max:5',
            'certificates_ar' => 'nullable|string',
            'programs_ar' => 'nullable|string',
            'plan_30_days_ar' => 'nullable|string',
            'dimensions' => 'nullable|array',
            'dimensions.*.name_ar' => 'required_with:dimensions|string',
            'dimensions.*.max_score' => 'required_with:dimensions|integer|min:1',
        ];
    }
}
