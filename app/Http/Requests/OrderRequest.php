<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_passed' => ['required', 'date'],
            'date_retrieve' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'date_passed.required' => 'La date de passage est requise.',
            'date_passed.date' => 'La date de passage doit être une date valide.',
            'date_retrieve.required' => 'La date de récupération est requise.',
            'date_retrieve.date' => 'La date de récupération doit être une date valide.'
        ];
    }

    public function attributes() : array
    {
        return [
                'date_passed' => 'date_passed',
                'date_retrieve' => 'date_retrieve'
        ];
    }
}
