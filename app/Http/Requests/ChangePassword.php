<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_new_password' => 'required|same:new_password',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'old_password.required' => __('validation.required', ['attribute' => 'Password Lama']),

            'new_password.required' => __('validation.required', ['attribute' => 'Password Baru']),
            'new_password.min' => __('validation.min', ['attribute' => 'Password Baru', 'value' => '8']),
            'new_password.different' => __('validation.different', ['attribute' => 'Password Baru', 'other' => 'old_password']),

            'new_password.required' => __('validation.required', ['attribute' => 'Konfirmasi Password Baru']),
            'new_password.same' => __('validation.same', ['attribute' => 'Konfirmasi Password Baru']),
        ];
    }
}
