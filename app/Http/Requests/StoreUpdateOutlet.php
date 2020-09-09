<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOutlet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'pic' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'name.date' => __('validation.date', ['attribute' => 'Name']),

            'address.required' => __('validation.required', ['attribute' => 'Address']),
            'address.date_format' => __('validation.date_format', ['attribute' => 'Address']),

            'pic.required' => __('validation.required', ['attribute' => 'PIC']),
            'pic.date_format' => __('validation.date_format', ['attribute' => 'PIC']),

            'phone.string' => __('validation.string', ['attribute' => 'Phone']),
            'phone.required' => __('validation.required', ['attribute' => 'Phone']),
        ];
    }
}
