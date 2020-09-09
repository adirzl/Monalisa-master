<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProgres extends FormRequest
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
            'tgl_pelaporan' => 'required|date',
            'minggu_ke' => 'required|string',
            'progres_fisik' => 'required|string',
            'note_pelaksanaan' => 'required|string',
        ];
    }

        /**
     * @return array
     */
    public function messages()
    {
        return [
            'tgl_pelaporan.required' => __('validation.required', ['attribute' => 'Tgl Pelaporan']),
            'tgl_pelaporan.date' => __('validation.date', ['attribute' => 'Tgl Pelaporan']),

            'minggu_ke.required' => __('validation.required', ['attribute' => 'Minggu Ke']),
            'minggu_ke.string' => __('validation.string', ['attribute' => 'Minggu Ke']),

            'progres_fisik.required' => __('validation.required', ['attribute' => 'progres_fisik']),
            'progres_fisik.string' => __('validation.string', ['attribute' => 'progres_fisik']),

            'note_pelaksanaan.required' => __('validation.required', ['attribute' => 'Note Pelaksana']),
            'note_pelaksanaan.string' => __('validation.string', ['attribute' => 'Note Pelaksana']),
        ];
    }
}
