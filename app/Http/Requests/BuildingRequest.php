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
            'name' => 'required|max:50',
            'sector_id' => 'required|exists:sectors,id',
            'type_id' => 'required|exists:types,id',
            'latitude' => 'required|decimal:0,4',
            'longitude' => 'required|decimal:0,4',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'name',
            'sector_id' => 'sector_id',
            'type_id' => 'type_id',
            'latitude' => 'latitude',
            'longitude' => 'longitude',
        ];
    }

}
