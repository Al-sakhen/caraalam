<?php

namespace App\Http\Requests\Dashboard\Drivers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDriverRequest extends FormRequest
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
                'unique:customers,email,' . $this->driver,
                'unique:drivers,email,' . $this->driver,
                'unique:merchants,email,' . $this->driver,
                'unique:users,email,' . $this->driver
            ],
            'phone' => [
                'required',
                'numeric',
                'digits_between:7,15',
                'unique:customers,phone,' . $this->driver,
                'unique:drivers,phone,' . $this->driver,
                'unique:merchants,phone,' . $this->driver,
                'unique:users,phone,' . $this->driver
            ],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
            'country_code' => ['required', 'string'],
            'dial_code' => ['required', 'string'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
            'city_id' => ['nullable', 'numeric', 'exists:cities,id'],
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:merchants,username,' . $this->driver,
                'unique:drivers,username,' . $this->driver,
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
