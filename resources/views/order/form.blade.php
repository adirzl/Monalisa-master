@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'order.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['order.update', $data->{$data->getKeyName()}]; }
    $exceptionField = ['ordertype','paymenttype'];
@endphp

@extends('layouts.templates.blank')
@section('title', ucwords('order'))
@section('subtitle', 'Form Order')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="col s12 m12 l4">
            <div class="card card card-default scrollspy">
                <div class="card-content">
                    @include('order.partials.form_order_header')
                </div>
            </div>
        </div>

        <div class="col s12 m12 l8">
            <div class="card card card-default scrollspy">
                <div class="card-content">
                    @include('order.partials.form_order_cart')
                </div>
            </div>
        </div>
    {{ Form::close() }}

    <div id="modal_loader" class="modal">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    @include('order.partials.form_order_productlist')
    @include('order.partials.modal_add_product_to_cart')
    @include('order.partials.form_order_addcustomer')
    @include('order.partials.form_order_customer')
    @include('order.partials.modal_order')
@endsection

