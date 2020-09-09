@php
    $title = 'wizard'; $method = 'put'; $action = ['page.wizardstore', $data->id];
@endphp

@extends('layouts.templates.default')
@section('title', 'Page')
@section('subtitle', 'Wizard')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div id="step_1">
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::select('create_route', getArrayConst('opt.YesNo'),1,['id' => 'create_route']) }}
                    {{ Form::label('create_route', 'Create Route') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::select('table_name', $tables, null,['id' => 'table_name', 'class' => 'browser-default']) }}
                    {{ Form::label('table_name', 'Table Name') }}
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Save</button>
    {{ Form::close() }}

@endsection
