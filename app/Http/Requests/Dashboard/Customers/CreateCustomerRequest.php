<?php

namespace App\Http\Requests\Dashboard\Customers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:customers,email',
                'unique:drivers,email',
                'unique:merchants,email',
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                'unique:customers,phone',
                'unique:drivers,phone',
                'unique:merchants,phone',
                'unique:users,phone'
            ],
            'status' => ['required', 'boolean'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
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
