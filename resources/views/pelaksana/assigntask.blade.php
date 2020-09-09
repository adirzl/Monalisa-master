@php
    $segment = request()->segment(2);
    $title = 'createtask'; $method = 'post'; $action = 'pelaksana.storetask';
    if ($segment == 'updatetask' ) { $title = 'edittask'; $method = 'put'; $action = ['pelaksana.updatetask', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('pelaksana'))
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="input-field col s12 l6">
                {{ Form::text('name', $data->name, [ 'id' => 'name', 'disabled' ]) }}
                {{ Form::label('name', ucwords('Nama')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('spmk_no', isset($data->pelaksana->spmk_no) ? $data->pelaksana->spmk_no : null, [ 'id' => 'spmk_no', 'disabled' ]) }}
                {{ Form::label('spmk_no', ucwords('spmk_no')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('email', $data->email, [ 'id' => 'email', 'disabled' ]) }}
                {{ Form::label('email', ucwords('Email')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('phone', $data->phone, [ 'id' => 'phone', 'disabled' ]) }}
                {{ Form::label('phone', ucwords('Phone')) }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col s12">
                @include('...layouts.partials.admin.button_form', [ 'backLink' => 'pelaksana.index'])
            </div>
        </div>
        <div class="col s12 new-section cyan white-text">
            <p>Silahkan pilih data Baseline yang akan ditugaskan kepada pelaksana ({{ count($baselines) }} data)</p>
            {{ Form::hidden('pelaksana_id', $data->id) }}
        </div>
        <div class="row mb-2">
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>X</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Keluarahan</th>
                    </thead>
                    <tbody>
                        @if(count($baselines))
                            @foreach($baselines as $baseline)
                                <tr>
                                    <td><label>{{ Form::checkbox('baseline_id[]', $baseline->id) }}<span></span></label></td>
                                    <td>{{ $baseline->id }}</td>
                                    <td>{{ $baseline->nama }}</td>
                                    <td>{{ $baseline->alamat }}</td>
                                    <td>{{ $baseline->kec }}</td>
                                    <td>{{ $baseline->kel }}</td>
                                </tr>
                            @endforeach
                        @else 
                                <tr><td colspan="6">No. Record(s) found</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'pelaksana.index'])
    {{ Form::close() }}

@endsection
