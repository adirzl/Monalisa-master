@extends('layouts.templates.default')
@section('title', ucwords('task'))
@section('subtitle', 'Show')

@section('subcontent')
    @foreach($fieldOnForm as $item)
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text($item, $item == 'status' ? $status[$data->$item] : $data->$item,['id' => $item, 'disabled' => true]) }}
                {{ Form::label($item, ucwords($item)) }}
            </div>
        </div>
    @endforeach
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'task.index'])
@endsection
