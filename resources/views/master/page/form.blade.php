@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'page.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['page.update', $data->id]; }
@endphp

@extends('layouts.templates.default')
@section('title', 'Page')
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text('label',$data->label,['id' => 'label']) }}
                {{ Form::label('label', 'Label') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                {{ Form::select('parent_id', $parent,$data->parent_id,['id' => 'parent_id']) }}
                {{ Form::label('parent', 'Parent') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                {{ Form::text('uri',$data->uri,['id' => 'uri']) }}
                {{ Form::label('uri', 'URI') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                {{ Form::text('sequence',$data->sequence,['id' => 'sequence']) }}
                {{ Form::label('sequence', 'Sequence') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                {{ Form::select('visible', getArrayConst('opt.YesNo'),$data->visible ? $data->visible : 1,['id' => 'visible']) }}
                {{ Form::label('visible', 'Visible') }}
            </div>
        </div>

        <button type="button" class="btn btn-warning save">Save</button>
        <a href="{{ route('page.index') }}" class="btn btn-danger">Back</a>
    {{ Form::close() }}

@endsection
