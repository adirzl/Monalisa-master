@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'stock.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['stock.update', $data->{$data->getKeyName()}]; }
    $exceptionField = ['outlet_id','product_id', 'status'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('stock'))
@section('subtitle', 'Form Stock')


@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    @if(in_array($item, $exceptionField))
                        {{ Form::select($item ,${$item}, $data->$item, ['id' => $item]) }}
                    @else
                        {{ Form::text($item,$data->$item,['id' => $item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'stock.index'])
    {{ Form::close() }}

@endsection
