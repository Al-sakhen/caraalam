<?php

namespace App\Http\Requests\Dashboard\Merchants;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateMerchantRequest extends FormRequest
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
                'unique:merchants,email',
                'unique:drivers,email',
                'unique:customers,email',
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'numeric',
                'digits_between:7,15',
                'unique:merchants,phone',
                'unique:drivers,phone',
                'unique:customers,phone',
                'unique:users,phone'
            ],
            'status' => ['required', 'boolean'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'image' => ['nullable', 'image'],
            'address' => ['required', 'string'],
            'building_num' => ['required', 'string'],
            'apartment_num' => ['nullable', 'string'],
            'country_code' => ['required', 'string'],
            'dial_code' => ['required', 'string'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
            'city_id' => ['nullable', 'numeric', 'exists:cities,id'],
            'delivery_cost' => ['nullable', 'numeric', 'min:0'],
            'out_of_country_delivery' => ['required', 'numeric', 'min:0'],
            'username' => [
                'required',
                'string',
                'unique:merchants,username',
                'unique:drivers,username',
            ],
            'instance_delivery_cost' => [
                'required_if:is_instant_delivery,1',
                'numeric',
                'min:0'
            ],
            'extra_cost' => [
                'numeric',
                'min:0'
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
