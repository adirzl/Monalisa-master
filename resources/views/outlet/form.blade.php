@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'outlet.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'PUT'; $action = ['outlet.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('outlet'))
@section('subtitle', 'Form Outlet')

@section('subcontent')
    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            {{ Form::hidden('_token', csrf_token() ,['id'=>'_token', 'class' => 'ajaxObj']) }}
            {{ Form::hidden('_method', $method ,['id'=>'_method', 'class' => 'ajaxObj']) }}
            @foreach($fieldOnForm as $item)
                <div class="input-field col s12">
                        {{ Form::text($item,$data->$item,['id' => $item, 'class' => 'ajaxObj']) }}
                        {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'outlet.index'])
        {{ Form::close() }}
@endsection
