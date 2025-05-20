<?php

namespace App\Http\Requests\Dashboard\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->admin],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,' . $this->admin],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.boolean' => 'The status field must be active or inactive.',
        ];
    }
}
