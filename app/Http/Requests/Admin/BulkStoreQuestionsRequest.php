<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreQuestionsRequest extends FormRequest
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
            'questions_text' => 'required|string',
        ];
    }
}
