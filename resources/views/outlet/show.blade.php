@extends('layouts.templates.default')
@section('title', ucwords('outlet'))
@section('subtitle', 'Show Outlet')

@section('subcontent')
    <div class="row">
        @foreach($fieldOnForm as $item)
            <div class="input-field col s12">
                {{ Form::text($item,$data->$item,['id' => $item, 'class' => 'ajaxObj', 'disabled' => true]) }}
                {{ Form::label($item, ucwords($item)) }}
            </div>
        @endforeach
    </div>
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'outlet.index'])
@endsection
