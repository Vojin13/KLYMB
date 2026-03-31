<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('brands','name')->ignore($this->brand)
            ],
            'slug' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('brands', 'slug')->ignore($this->brand)
            ],
            'website' => 'nullable|url|max:255|string|min:3',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
