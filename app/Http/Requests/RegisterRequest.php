<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'national_id'   => ['required', 'string', 'max:20', Rule::unique('users', 'national_id')->whereNull('deleted_at')],
            'phone'         => ['required', 'string', 'max:20', Rule::unique('users', 'phone')->whereNull('deleted_at')],
            'gender'        => 'required|string|in:male,female',
            'qualification' => 'required|string|max:255',
            'nationality'   => 'required|string|max:255',
            'password'      => 'required|min:8|confirmed',
        ];
    }
}
