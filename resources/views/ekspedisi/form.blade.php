@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'ekspedisi.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['ekspedisi.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('ekspedisi'))
@section('subtitle', 'Form Ekspedisi')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text($item,$data->$item,['id' => $item]) }}
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'ekspedisi.index'])
    {{ Form::close() }}

@endsection
