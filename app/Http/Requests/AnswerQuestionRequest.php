<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'question_id' => 'required|uuid|exists:questions,id,deleted_at,NULL',
            'selected_option_id' => 'required|uuid|exists:answer_options,id,deleted_at,NULL',
        ];
    }
}
