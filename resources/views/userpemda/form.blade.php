@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'userpemda.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['userpemda.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('user pemda'))
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="input-field col s12">
                {{ Form::select('kabkot_id', $area, $data->kabkot_id, [ 'id' => 'kabkot_id' ]) }}
                {{ Form::label('kabkot_id', ucwords('Kab/Kota')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('name', $data->name, [ 'id' => 'name' ]) }}
                {{ Form::label('name', ucwords('Nama')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('email', $data->email, [ 'id' => 'email' ]) }}
                {{ Form::label('email', ucwords('Email')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('phone', $data->phone, [ 'id' => 'phone' ]) }}
                {{ Form::label('phone', ucwords('Phone')) }}
            </div>
        </div>
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'userpemda.index'])
    {{ Form::close() }}

@endsection
