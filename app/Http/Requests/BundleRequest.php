<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BundleRequest extends FormRequest
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
            'product' => ['required', 'max:100'],
            'quantity' => ['required', 'min:1'],
            'price' => ['required', 'min:0.01'],
        ];
    }


    public function messages(): array
    {
        return [
            'product.required' => 'Le nom du produit est requis.',
            'product.string' => 'Le nom du produit doit être une chaîne de caractères.',
            'product.max' => 'Le nom du produit ne peut pas dépasser 100 caractères.',
            'quantity.required' => 'La quantité est requise.',
            'quantity.integer' => 'La quantité doit être un nombre entier.',
            'quantity.min' => 'La quantité doit être au moins de 1.',
            'price.required' => 'Le prix est requis.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'price.min' => 'Le prix doit être d\'au moins 0,01.'
        ];
    }

    public function attributes() : array
    {
        return [
                'product' => 'product',
                'quantity' => 'quantity',
                'price' => 'price'
        ];
    }
}
