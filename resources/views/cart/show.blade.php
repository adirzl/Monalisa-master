@extends('layouts.templates.default')
@section('title', ucwords('cart'))
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
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'cart.index'])
@endsection
