<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Le nom du bâtiment est obligatoire.',
            'name.string' => 'Le nom du bâtiment doit être une chaîne de caractères.',
            'name.max' => 'Le nom du bâtiment ne peut pas dépasser 50 caractères.',
        ];
    }

     
    public function attributes() : array
    {
        return [
                'name' => 'name',
        ];
    }

}
