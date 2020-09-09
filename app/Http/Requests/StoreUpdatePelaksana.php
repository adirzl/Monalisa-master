<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePelaksana extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|string',

            'nilai_kontrak' => 'required|numeric',
            'spmk_no' => 'required|string',
            'spmk_date' => 'required|date',
            'spmk_start_date' => 'required|date'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Nama']),
            'name.string' => __('validation.string', ['attribute' => 'Nama']),

            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),

            'phone.required' => __('validation.required', ['attribute' => 'Phone']),
            'phone.string' => __('validation.string', ['attribute' => 'Phone']),

            'nilai_kontrak.required' => __('validation.required', ['attribute' => 'Nilai Kontrak']),
            'nilai_kontrak.numeric' => __('validation.numeric', ['attribute' => 'Nilai Kontrak']),

            'spmk_no.required' => __('validation.required', ['attribute' => 'No. SPMK']),
            'spmk_no.string' => __('validation.string', ['attribute' => 'No. SPMK']),

            'spmk_date.required' => __('validation.required', ['attribute' => 'SMPK Date']),
            'spmk_date.date' => __('validation.date', ['attribute' => 'SMPK Date']),

            'spmk_start_date.required' => __('validation.required', ['attribute' => 'SMPK Start Date']),
            'spmk_start_date.date' => __('validation.date', ['attribute' => 'SMPK Start Date']),
        ];
    }
}
