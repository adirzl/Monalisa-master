<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAttendance extends FormRequest
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
            'attendance_date' => 'required|date_format:d/M/Y',
            'check_in' => 'date_format:h:i A',
            'check_out' => 'date_format:h:i A',
        ];
    }


    /**
     * @return array
     */
    public function messages()
    {
        return [
            'attendance_date.required' => __('validation.required', ['attribute' => 'Attendance Date']),
            'attendance_date.date' => __('validation.date', ['attribute' => 'Attendance Date']),

            // 'check_in.required' => __('validation.required', ['attribute' => 'Check In']),
            'check_in.date_format' => __('validation.date_format', ['attribute' => 'Check In']),

            // 'check_out.required' => __('validation.required', ['attribute' => 'Check Out']),
            'check_out.date_format' => __('validation.date_format', ['attribute' => 'Check Out']),
        ];
    }
}
