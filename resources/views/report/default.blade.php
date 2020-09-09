@php
    $title = 'export'; $method = 'post'; $action = 'report.export_ba';
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('report'))
@section('subtitle', 'Default')

@section('subcontent')
    {{ Form::model($kabkot, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off', 'id' => 'form-report']) }}
        <div class="row">
            <div class="input-field col s12 l6">
                {{ Form::select('kabkot_id', $kabkot, null, [ 'id' => 'kabkot_id', 'class' => '' ]) }}
                {{ Form::label('kabkot_id', ucwords('Kabupaten/Kota')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::select('type', to_dropdown($progres_fisik, 'key', 'value'), null, [ 'id' => 'type', 'class' => '' ]) }}
                {{ Form::label('type', ucwords('Jenis Report')) }}
            </div>
        </div>
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'report.index'])
    {{ Form::close() }}
@endsection
