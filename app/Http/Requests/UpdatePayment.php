<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayment extends FormRequest
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
            // 'ordertype' => 'required|string',
            // 'customer_id' => 'required_if:ordertype,3',
            // 'note' => 'required|string',
            'grandtotal' => 'required|numeric',
            'paymenttype' => 'required|string',
            'amount_received' => 'required_if:paymenttype,1|numeric|gte:grandtotal',
            'payment_number' => 'required_unless:paymenttype,1',
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

            'paymenttype.required' => __('validation.required', ['attribute' => 'Tipe Pembayaran']),
            'paymenttype.string' => __('validation.string', ['attribute' => 'Tipe Pembayaran']),

            'amount_received.required_if' => __('validation.required_if', ['attribute' => 'Amount Received', 'other' => 'paymenttype', 'value' => 'Cash']),
            'amount_received.gte' => __('validation.gte', ['attribute' => 'Amount Received', 'other' => 'Grand total']),
            'amount_received.numeric' => __('validation.numeric', ['attribute' => 'Amount Received']),

            'amount_received.required_unless' => __('validation.required_unless', ['attribute' => 'Payment Number', 'other' => 'paymenttype', 'value' => 'Cash']),
            'amount_received.string' => __('validation.string', ['attribute' => 'Payment Number']),
        ];
    }
}
