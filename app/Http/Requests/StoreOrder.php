<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'ordertype' => 'required|string',
            'customer_id' => 'required_if:ordertype,3',
            'note' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'ordertype.required' => __('validation.required', ['attribute' => 'Order Type']),
            'ordertype.string' => __('validation.string', ['attribute' => 'Order Type']),

            'customer_id.required_if' => __('validation.required_if', ['attribute' => 'Customer', 'other' => 'ordertype', 'value' => 'Delivery']),
            'customer_id.string' => __('validation.string', ['attribute' => 'Customer']),

            'note.required' => __('validation.required', ['attribute' => 'Catatan']),
            'note.string' => __('validation.string', ['attribute' => 'Catatan']),
        ];
    }
}
