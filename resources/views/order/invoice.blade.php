
@php
    $title = 'create'; $method = 'post'; $action = 'order.store'; $is_update =  true;
@endphp

@extends('layouts.templates.blank')
@section('title', ucwords('order'))

@section('subcontent')
    <div class="row">
        <div class="col s12 m12 l12">
            @if($data->status == 2)
                <a href="{{ route('order.export_bill', [$data->id]) }}" class="btn red"><i class="material-icons left">picture_as_pdf</i>Export to PDF</a>
                <a href="{{ route('order.preview_bill', [$data->id]) }}" target="_blank" class="btn teal"><i class="material-icons left">local_printshop</i>Preview</a>
                {{-- <button id="btn-print-preview" class="btn cyan"><i class="material-icons left">local_printshop</i>Preview</button> --}}
            @elseif($data->status == 1)
                <button id="btn-invoice-payment" class="btn teal"><i class="material-icons left">money</i>Bayar</button>
            @endif
            <a href="{{ route('order.index') }}" class="btn cyan"><i class="material-icons left">arrow_back</i>Kembali</a>
            {{ Form::hidden('id', $data->id, ['id' => 'id'])}}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="basic-tabs" class="card card card-default scrollspy">
                <div class="card-content pt-5 pr-5 pb-5 pl-5">
                    <div id="invoice">
                        <div class="invoice-header">
                            <div class="row section">
                                <div class="col s12 m6 l6">
                                    {{-- <img class="mb-2 width-50" src="../../../app-assets/images/logo/materialize-logo-big.png" alt="company logo"> --}}
                                    <p>125, ABC Street, New Yourk, USA</p>
                                    <p>888-555-2311</p>
                                </div>
                                <div class="col s12 m6 l6">
                                    <h4 class="text-uppercase right-align strong mb-5">Invoice</h4>
                                </div>
                            </div>
                            <div class="row section">
                                <div class="col s12 m6 l6">
                                    @if(isset($data->customer))
                                        <h6 class="text-uppercase strong mb-2 mt-3">Recipient</h6>
                                        <p class="text-uppercase">Jonathan Doe</p>
                                        <p>125, ABC Street, New Yourk, USA</p>
                                        <p>VAT no.: 18012384</p>
                                    @endif
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="invoce-no right-align">
                                        <p><span class="text-uppercase strong">order No.</span> {{ $data->order_number }}</p>
                                    </div>
                                    <div class="invoce-no right-align">
                                        <p><span class="text-uppercase strong">Invoice Date: </span> {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-table">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <table class="highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="item">Item</th>
                                                <th data-field="uprice">Unit Price</th>
                                                <th data-field="price">Unit</th>
                                                <th data-field="price">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @php($total = 0)
                                            @foreach($data->detailorder as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->product->price->first()->price }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->product->price->first()->price * $item->qty }}</td>
                                                </tr>
                                                @php($total = $total + ($item->price * $item->qty))
                                            @endforeach
                                        <tr class="border-none">
                                            <td colspan="3"></td>
                                            <td>Total:</td>
                                            <td>Rp.{{ number_format($total) }}</td>
                                        </tr>
                                        {{-- php($disc = isset($data->discount) || $data->discount != null ? ($data->discount->percentage/100)*$total : 0) --}}
                                        @php($disc = ($data->discount_percentage/100)*$total)
                                        <tr class="border-none">
                                            <td colspan="3"></td>
                                            <td>Discount:</td>
                                            {{-- <td>{{ isset($data->discount) || $data->discount != null ? $data->discount->percentage : '0' }}% Rp.{{ number_format($disc) }}</td> --}}
                                            <td>{{ isset($data->discount_percentage) || $data->discount_percentage != null ? $data->discount_percentage : '0' }}% Rp.{{ number_format($disc) }}</td>
                                        </tr>
                                        @php($tax = (10/100)*($total-$disc))
                                        <tr class="border-none">
                                            <td colspan="3"></td>
                                            <td>Tax:</td>
                                            <td>Rp.{{ number_format($tax) }}</td>
                                        </tr>
                                        <tr class="border-none">
                                            <td colspan="3"></td>
                                            <td class="cyan white-text pl-1">Grand Total</td>
                                            <td class="cyan strong white-text">Rp.{{ number_format($total-$disc+$tax) }}</td>
                                        </tr>
                                        <tr class="border-none">
                                            <td colspan="3"></td>
                                            <td class="pink white-text pl-1">Status</td>
                                            <td class="pink strong white-text">{{ $status_order[$data->status] }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div id="cart-grandtotal" class="hide"><h5>Rp.{{ number_format($total-$disc+$tax) }}</h5></div>
                                    {{ Form::hidden('grand-total', $total-$disc+$tax, ['id' => 'grand-total'])}}
                                </div>
                            </div>
                        </div>
                        <div class="invoice-footer mt-6">
                            {{-- <div class="row">
                                <div class="col s12 m6 l6">
                                    <p class="strong">Payment Method</p>
                                    <p>Please make the cheque to: AMANDA ORTON</p>
                                    <p class="strong">Terms & Condition</p>
                                    <ul>
                                        <li>You know, being a test pilot isn't always the healthiest business in the world.</li>
                                        <li>We predict too much for the next year and yet far too little for the next 10.</li>
                                    </ul>
                                </div>
                                <div class="col s12 m6 l6 center-align">
                                    <p>Approved By</p>
                                    <img src="../../../app-assets/images/misch/signature-scan.png" alt="signature">
                                    <p class="header">AMANDA ORTON</p>
                                    <p>Managing Director</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('order.partials.modal_order')
@endsection
