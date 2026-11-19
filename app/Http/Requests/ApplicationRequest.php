<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after_or_equal:today',
            'payment' => 'required|in:При очном посещении,Оплата по СБП',
        ];
    }

    public function messages(): array{
        return [
            'room_id.required' => 'Выберите помещение.',
            'date.after_or_equal' => 'Дата не может быть в прошлом.',
            'payment.in' => 'Выберите корректный способ оплаты.'
        ];
    }
}
