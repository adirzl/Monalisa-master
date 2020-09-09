@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'order.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['order.update', $data->{$data->getKeyName()}]; }
    $exceptionField = ['ordertype','paymenttype'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('order'))
@section('subtitle', 'Form Order')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @foreach($fieldOnForm as $item)
                <div class="row">
                    <div class="input-field col s12">
                        @if(in_array($item, $exceptionField))
                            {{ Form::select($item, ${$item}, $data->$item, ['id' => $item]) }}
                        @else
                            {{ Form::text($item,$data->$item,['id' => $item]) }}
                        @endif

                        {{ Form::label($item, ucwords($item)) }}
                    </div>
                </div>
            @endforeach
            @include('...layouts.partials.admin.button_form', [ 'backLink' => 'order.index'])
        </div>
        <div class="row card gradient-45deg-light-blue-teal">
            <div class="input-field col s12 show-on-medium-and-down center-align">
                <p>DETAIL TASK</p>
            </div>
            <div class="input-field col s12 hide-on-med-and-down">
                <div class="col s4">
                    {{ strtoupper('product') }}
                </div>
                <div class="col s4">
                    {{ strtoupper('qty') }}
                </div>
            </div>
            <div id="story-detail-holder">
                <div class="row first-add-button-holder">
                    <div class="input-field col s12 center">
                        <button type="button" class="waves-effect btn gradient-45deg-light-blue-cyan btn-add-story-detail first-add-button"> <i class="material-icons">add</i></button>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
    <div hidden>
        @include('order.order_detail_template')
    </div>
@endsection
