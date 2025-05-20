<?php

namespace App\Http\Requests\Dashboard\Merchants;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMerchantRequest extends FormRequest
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
                'unique:customers,email,' . $this->merchant,
                'unique:merchants,email,' . $this->merchant,
                'unique:drivers,email,' . $this->merchant,
                'unique:users,email,' . $this->merchant

            ],
            'phone' => [
                'required',
                'numeric',
                'digits_between:7,15',
                'unique:customers,phone,' . $this->merchant,
                'unique:merchants,phone,' . $this->merchant,
                'unique:drivers,email,' . $this->merchant,
                'unique:users,email,' . $this->merchant

            ],
            'status' => ['required', 'boolean'],
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
                'max:255',
                'unique:merchants,username,' . $this->merchant,
                'unique:drivers,username,' . $this->merchant,
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
            // 'is_original_delivery' => [
            //     function ($attribute, $value, $fail) {
            //         dd($attribute, $value);
            //         $isInstantDelivery = request()->get('is_instant_delivery');
            //         $isCyclicDelivery = request()->get('is_cyclic_delivery');

            //         if (is_null($isInstantDelivery) && is_null($isCyclicDelivery)) {
            //             $fail('The ' . $attribute . ' field is required when both is_instant_delivery and is_cyclic_delivery are null.');
            //         } elseif ($isInstantDelivery == 0 && $isCyclicDelivery == 0) {
            //             $fail('The ' . $attribute . ' field is required when both is_instant_delivery and is_cyclic_delivery are 0.');
            //         }
            //     },
            // ]
        ];
    }

    public function messages(): array
    {
        return [
            'status.boolean' => 'The status field must be active or inactive.',
        ];
    }
}
