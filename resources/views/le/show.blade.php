@extends('layouts.templates.default')
@section('title', ucwords('LE'))
@section('subtitle', 'Show')

@section('subcontent')
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text('kabkot_id', $data->area->name, [ 'id' => 'kabkot_id', 'disabled' ]) }}
                {{ Form::label('kabkot_id', ucwords('Kab/Kota')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('name', $data->name, [ 'id' => 'name', 'disabled' ]) }}
                {{ Form::label('name', ucwords('Nama')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('email', $data->email, [ 'id' => 'email', 'disabled' ]) }}
                {{ Form::label('email', ucwords('Email')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('phone', $data->phone, [ 'id' => 'phone', 'disabled' ]) }}
                {{ Form::label('phone', ucwords('Phone')) }}
            </div>
        </div>
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'le.index'])
@endsection
