@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'price.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['price.update', $data->{$data->getKeyName()}]; }
    $exceptionField = ['outlet_id','product_id', 'status'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('price'))
@section('subtitle', 'Form Price')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                @if(in_array($item, $exceptionField))
                    <div class="input-field col s12">
                        {{ Form::select($item,${$item},$data->$item,['id' => $item]) }}
                        {{ Form::label($item, ucwords($item)) }}
                    </div>
                @else
                    <div class="input-field col s12">
                        {{ Form::text($item,$data->$item,['id' => $item]) }}
                        {{ Form::label($item, ucwords($item)) }}
                    </div>
                @endif
            </div>
        @endforeach
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'price.index'])
    {{ Form::close() }}

@endsection
