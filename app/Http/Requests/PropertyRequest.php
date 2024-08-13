<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'surface' => ['required', 'integer'],
            'rooms' => ['required', 'integer'],
            'bedrooms' => ['required', 'integer'],
            'floor' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'city' => ['required', 'min:4'],
            'adresse' => ['required', 'min:4'],
            'postal_code' => ['required', 'min:4'],
            'sold' => ['required', 'boolean'],
            'options' => ['array','exists:options,id','required'],
        ];
    }
}
