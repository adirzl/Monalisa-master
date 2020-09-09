@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'configuration.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['configuration.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('configuration'))
@section('subtitle', 'Form Configuration')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        {{-- @foreach($fieldOnForm as $item) --}}
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('key',$data->key,['id' => 'key', 'disabled']) }}
                    {{ Form::label('key', ucwords('key')) }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('value',$data->value,['id' => 'value']) }}
                    {{ Form::label('value', ucwords('value')) }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('notes',$data->notes,['id' => 'notes']) }}
                    {{ Form::label('notes', ucwords('notes')) }}
                </div>
            </div>
        {{-- @endforeach --}}
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'configuration.index'])
    {{ Form::close() }}

@endsection
