@extends('layouts.templates.default')
@section('title', ucwords('price'))
@section('subtitle', 'Show Price')
@php
    $foreignKey = ['outlet_id', 'product_id'];
@endphp

@section('subcontent')
    @foreach($fieldOnForm as $item)
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text($item, in_array($item, $foreignKey) ? $data->{substr($item, 0, strlen($item) - 3)}->name : $data->$item,['id' => $item, 'disabled' => true]) }}
                {{ Form::label($item, ucwords($item)) }}
            </div>
        </div>
    @endforeach
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'price.index'])
@endsection
