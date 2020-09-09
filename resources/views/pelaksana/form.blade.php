@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'pelaksana.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['pelaksana.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('pelaksana'))
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
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

            <div class="input-field col s12">
                {{ Form::text('nilai_kontrak', isset($data->pelaksana->nilai_kontrak) ? $data->pelaksana->nilai_kontrak : null, [ 'id' => 'nilai_kontrak' ]) }}
                {{ Form::label('nilai_kontrak', ucwords('nilai kontrak')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('spmk_no', isset($data->pelaksana->spmk_no) ? $data->pelaksana->spmk_no : null, [ 'id' => 'spmk_no' ]) }}
                {{ Form::label('spmk_no', ucwords('spmk_no')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('spmk_date', isset($data->pelaksana->spmk_date) ? $data->pelaksana->spmk_date : null, [ 'id' => 'spmk_date', 'class' => 'datepicker' ]) }}
                {{ Form::label('spmk_date', ucwords('spmk_date')) }}
            </div>


            <div class="input-field col s12">
                {{ Form::text('spmk_start_date', isset($data->pelaksana->spmk_start_date) ? $data->pelaksana->spmk_start_date : null, [ 'id' => 'spmk_start_date', 'class' => 'datepicker' ]) }}
                {{ Form::label('spmk_start_date', ucwords('spmk_start_date')) }}
            </div>

        </div>
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'pelaksana.index'])
    {{ Form::close() }}

@endsection
