<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'application_id' => 'required|exists:applications,id',
            'text' => 'required|string|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Напишите текст отзыва.',
            'text.min' => 'Отзыв должен быть не менее 5 символов.',
        ];
    }
}
