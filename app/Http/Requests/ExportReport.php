<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportReport extends FormRequest
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
            'report_type' => 'required|string',
            'user_id' => 'required_if:report_type,1',
            'story_date' => 'required_if:report_type,2',
            // 'type' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'report_type.required' => __('validation.required', ['attribute' => 'Report Type']),
            'report_type.string' => __('validation.string', ['attribute' => 'Report Type']),

            'user_id.required_if' => __('validation.required_if', ['attribute' => 'User ID', 'other' => 'Report Type', 'value' => 'By User']),
            'user_id.string' => __('validation.string', ['attribute' => 'User ID']),

            'story_date.required_if' => __('validation.required_if', ['attribute' => 'Story Date', 'other' => 'Report Type', 'value' => 'By Date']),
            'story_date.string' => __('validation.string', ['attribute' => 'Story Date']),

            'type.string' => __('validation.string', ['attribute' => 'Type']),
            'type.required' => __('validation.required', ['attribute' => 'Type']),
        ];
    }
}
