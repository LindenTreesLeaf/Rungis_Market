<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'name' => 'required|max:50',
            'last_revision' => 'required|date',
            'next_revision' => 'required|date',
            'building_id' => 'required|exists:buildings,id',
            'condition_id' => 'required|exists:conditions,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 50 caractères.',
            'last_revision.required' => 'La dernière révision est requise.',
            'last_revision.date' => 'La dernière révision doit être une date valide.',
            'next_revision.required' => 'La prochaine révision est requise.',
            'next_revision.date' => 'La prochaine révision doit être une date valide.'
        ];
    }


    public function attributes() : array
    {
        return [
                'name' => 'name',
                'last_revision' => 'last_revision',
                'next_revision' => 'next_revision',
                'building_id' => 'building_id',
                'condition_id' => 'condition_id',
        ];
    }
}
