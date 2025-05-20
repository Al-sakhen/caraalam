<?php

namespace App\Http\Requests\Dashboard\Customers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerRequest extends FormRequest
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
                'unique:customers,email,' . $this->customer,
                'unique:drivers,email,' . $this->customer,
                'unique:merchants,email,' . $this->customer,
                'unique:users,email,' . $this->customer

            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                'unique:customers,phone,' . $this->customer,
                'unique:drivers,phone,' . $this->customer,
                'unique:merchants,phone,' . $this->customer,
                'unique:users,phone,' . $this->customer
            ],
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
