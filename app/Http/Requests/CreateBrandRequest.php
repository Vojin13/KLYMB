<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
            'name' => 'required|unique:brands|max:255|string|min:3',
            'slug' => 'required|unique:brands|max:255|string|min:3',
            'website' => 'nullable|url|max:255|string|min:3',
            'description' => 'nullable|string|min:3',
        ];
    }
}
