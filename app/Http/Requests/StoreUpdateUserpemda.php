<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserpemda extends FormRequest
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
            'kabkot_id' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string'
        ];
    }

            /**
     * @return array
     */
    public function messages()
    {
        return [
            'kabkot_id.required' => __('validation.required', ['attribute' => 'Kabupaten/Kota']),
            'kabkot_id.string' => __('validation.string', ['attribute' => 'Kabupaten/Kota']),

            'name.required' => __('validation.required', ['attribute' => 'Nama']),
            'name.string' => __('validation.string', ['attribute' => 'Nama']),

            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),

            'phone.required' => __('validation.required', ['attribute' => 'Phone']),
            'phone.string' => __('validation.string', ['attribute' => 'Phone']),
        ];
    }
}
