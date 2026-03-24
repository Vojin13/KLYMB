<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->user)],
            'username' => ['required','string','max:255','min:3', Rule::unique('users','username')->ignore($this->user)],
            'date_of_birth' => 'required|date|before:today',
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'sometimes|required|exists:roles,id',
            'is_active' => 'nullable|boolean',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
