@extends('layouts.templates.default')
@section('title', ucwords('pelaksana'))
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

            <div class="input-field col s12">
                {{ Form::text('nilai_kontrak', isset($data->pelaksana->nilai_kontrak) ? 'Rp.'.number_format($data->pelaksana->nilai_kontrak) : null, [ 'id' => 'nilai_kontrak', 'disabled' ]) }}
                {{ Form::label('nilai_kontrak', ucwords('nilai kontrak')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('spmk_no',  isset($data->pelaksana->spmk_no) ? $data->pelaksana->spmk_no : null, [ 'id' => 'spmk_no', 'disabled' ]) }}
                {{ Form::label('spmk_no', ucwords('spmk_no')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('spmk_date',  isset($data->pelaksana->spmk_date) ? $data->pelaksana->spmk_date : null, [ 'id' => 'spmk_date', 'class' => 'datepicker', 'disabled' ]) }}
                {{ Form::label('spmk_date', ucwords('spmk_date')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('spmk_start_date',  isset($data->pelaksana->spmk_start_date) ? $data->pelaksana->spmk_start_date : null, [ 'id' => 'spmk_start_date', 'class' => 'datepicker', 'disabled' ]) }}
                {{ Form::label('spmk_start_date', ucwords('spmk_start_date')) }}
            </div>
        </div>
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'pelaksana.index'])
@endsection
