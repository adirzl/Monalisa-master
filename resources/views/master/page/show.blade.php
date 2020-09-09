@extends('layouts.templates.default')
@section('title', 'Page')
@section('subtitle', 'Show')

@section('subcontent')
    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('label',$data->label,['id' => 'label', 'disabled' => true]) }}
            {{ Form::label('label', 'Label') }}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('parent_id',$data->parent_id,['id' => 'parent_id', 'disabled' => true]) }}
            {{ Form::label('parent', 'Parent') }}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('uri',$data->uri,['id' => 'uri', 'disabled' => true]) }}
            {{ Form::label('uri', 'URI') }}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('sequence',$data->sequence,['id' => 'sequence', 'disabled' => true]) }}
            {{ Form::label('sequence', 'Sequence') }}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('visible',$data->visible ? $data->visible : 1,['id' => 'visible', 'disabled' => true]) }}
            {{ Form::label('visible', 'Visible') }}
        </div>
    </div>

    <a href="{{ route('page.index') }}" class="btn btn-danger">Back</a>
@endsection