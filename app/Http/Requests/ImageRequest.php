<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'description' => 'required|string|max:50',
            'url' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne peut pas dépasser 50 caractères.',
            'url.required' => 'L\'url est requis.',
            'url.string' => 'L\'url doit être une chaîne de caractères.',
            'url.max' => 'L\'url ne peut pas dépasser 50 caractères.',
        ];
    }

    public function attributes() : array
    {
        return [
                'description' => 'description',
                'url' => 'url',
        ];
    }
}
