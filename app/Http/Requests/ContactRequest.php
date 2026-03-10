<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:1000|min:10',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'message.required' => 'Message is required',
            'message.max' => 'Message is too long (1000 characters max)',
            'message.min' => 'Message is too short (10 characters min)',
            'email.max' => 'Email is not valid',
            'email.email' => 'Email is not valid'
        ];
    }
}
