<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'assessment_id' => 'required|uuid|exists:assessments,id,deleted_at,NULL',
            'dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL',
            'text_ar' => 'required|string',
            'is_reversed' => 'nullable|boolean',
            'options' => 'required|array|min:2',
            'options.*.label_ar' => 'required|string',
            'options.*.score_value' => 'required|integer',
        ];
    }
}
