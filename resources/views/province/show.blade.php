@extends('layouts.templates.default')
@section('title', ucwords('Show Province'))
@section('subtitle', 'Show')

@section('subcontent')
    @foreach($fieldOnForm as $item)
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text($item,$data->$item,['id' => $item, 'disabled' => true]) }}
                {{ Form::label($item, ucwords($item)) }}
            </div>
        </div>
    @endforeach
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'province.index'])
@endsection
