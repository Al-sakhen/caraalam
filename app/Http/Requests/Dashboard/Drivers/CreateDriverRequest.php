<?php

namespace App\Http\Requests\Dashboard\Drivers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateDriverRequest extends FormRequest
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
                'nullable',
                'string',
                'email',
                'max:255',
                'unique:drivers,email',
                'unique:merchants,email',
                'unique:customers,email',
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'numeric',
                'digits_between:7,15',
                'unique:drivers,phone',
                'unique:merchants,phone',
                'unique:customers,phone',
                'unique:users,phone'
            ],
            'status' => ['required', 'boolean'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'image' => ['nullable', 'image'],
            'country_code' => ['required', 'string'],
            'dial_code' => ['required', 'string'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
            'city_id' => ['nullable', 'numeric', 'exists:cities,id'],
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:merchants,username',
                'unique:drivers,username',
            ],
            'payroll_amount' => [
                'numeric',
                'min:0',
                'max:9999999999.999'
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'status.boolean' => 'The status field must be active or inactive.',
        ];
    }
}
