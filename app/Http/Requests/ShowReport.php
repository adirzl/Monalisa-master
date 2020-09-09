<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowReport extends FormRequest
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
            'type' => 'required|string',
        ];
    }

        /**
     * @return array
     */
    public function messages()
    {
        return [
            'kabkot_id.required' => __('validation.required', ['attribute' => 'Kab/Kota']),
            'kabkot_id.string' => __('validation.string', ['attribute' => 'Kab/Kota']),

            'type.required' => __('validation.required', ['attribute' => 'type report']),
            ' report.string' => __('validation.string', ['attribute' => 'type report']),
        ];
    }
}
