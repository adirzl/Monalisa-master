<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStory extends FormRequest
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
            'date_story' => 'required|date_format:d/M/Y',
            'check_in' => 'required|date_format:H:i:s',
            'check_out' => 'required|date_format:H:i:s',
            'location' => 'required|string',
            // 'check_in_second' => 'required|string',
            // 'check_out_second' => 'required|string',
            'child.*.task' => 'required|string',
            'child.*.status' => 'required|string',
            'child.*.description' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'date_story.required' => __('validation.required', ['attribute' => 'Story Date']),
            'date_story.date' => __('validation.date', ['attribute' => 'Story Date']),

            'check_in.required' => __('validation.required', ['attribute' => 'Check In']),
            'check_in.date_format' => __('validation.date_format', ['attribute' => 'Check In']),

            'check_out.required' => __('validation.required', ['attribute' => 'Check Out']),
            'check_out.date_format' => __('validation.date_format', ['attribute' => 'Check Out']),

            'location.string' => __('validation.string', ['attribute' => 'Location']),
            'location.required' => __('validation.required', ['attribute' => 'Location']),

            // 'check_in_second.string' => __('validation.string', ['attribute' => 'Check In Second']),
            // 'check_in_second.required' => __('validation.required', ['attribute' => 'Check In Second']),

            // 'check_out_second.string' => __('validation.string', ['attribute' => 'Check Out Second']),
            // 'check_out_second.required' => __('validation.required', ['attribute' => 'Check Out Second']),

            'child.*.task.required' => __('validation.required', ['attribute' => 'Task']),
            'child.*.task.string' => __('validation.string', ['attribute' => 'Task']),

            'child.*.status.required' => __('validation.required', ['attribute' => 'Status']),
            'child.*.status.string' => __('validation.string', ['attribute' => 'Status']),

            'child.*.description.string' => __('validation.string', ['attribute' => 'Description']),
            'child.*.description.required' => __('validation.required', ['attribute' => 'Description']),
        ];
    }
}
