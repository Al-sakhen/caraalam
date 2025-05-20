<?php

namespace App\Http\Requests\Api\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'lang' => ['required'],
            'sub_total' => ['required', 'numeric'],
            'c_name' => ['required'],
            'c_email' => ['sometimes', 'email'],
            'c_phone' => ['required'],
            'c_country' => ['sometimes', 'string'],
            'c_city' => ['required'],
            'c_region' => ['required'],
            'c_street' => ['required'],
            'c_building_num' => ['required'],
            'c_apartment_num' => ['required'],
            'more_info' => ['sometimes', 'string'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.name' => ['required', 'string'],
            'items.*.description' => ['sometimes', 'string'],
            'items.*.color' => ['sometimes', 'string'],
            'items.*.width' => ['sometimes', 'string'],
            'items.*.height' => ['sometimes', 'string'],
            'items.*.weight' => ['sometimes', 'string'],
            'items.*.more_info' => ['sometimes', 'string'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'lang.required' => __('api_validation.lang_required'),
            'sub_total.required' => __('api_validation.sub_total_required'),
            'sub_total.numeric' => __('api_validation.sub_total_numeric'),
            'c_name.required' => __('api_validation.c_name_required'),
            'c_email.email' => __('api_validation.c_email_email'),
            'c_phone.required' => __('api_validation.c_phone_required'),
            'c_city.required' => __('api_validation.c_city_required'),
            'c_region.required' => __('api_validation.c_region_required'),
            'c_street.required' => __('api_validation.c_street_required'),
            'c_building_num.required' => __('api_validation.c_building_num_required'),
            'c_apartment_num.required' => __('api_validation.c_apartment_num_required'),
            'items.required' => __('api_validation.items_required'),
            'items.array' => __('api_validation.items_array'),
            'items.min' => __('api_validation.items_min'),
            'items.*.name.required' => __('api_validation.items_name_required'),
            'items.*.name.string' => __('api_validation.items_name_string'),
            'items.*.description.string' => __('api_validation.items_description_string'),
            'items.*.color.string' => __('api_validation.items_color_string'),
            'items.*.width.string' => __('api_validation.items_width_string'),
            'items.*.height.string' => __('api_validation.items_height_string'),
            'items.*.weight.string' => __('api_validation.items_weight_string'),
            'items.*.more_info.string' => __('api_validation.items_more_info_string'),
            'items.*.quantity.required' => __('api_validation.items_quantity_required'),
            'items.*.quantity.integer' => __('api_validation.items_quantity_integer'),
            'items.*.quantity.min' => __('api_validation.items_quantity_min'),
        ];
    }
}
