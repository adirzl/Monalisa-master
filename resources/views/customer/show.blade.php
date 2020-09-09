@extends('layouts.templates.default')
@section('title', ucwords('customer'))
@section('subtitle', 'Show Customer')
@php
    $foreignKey = ['province_id'];
@endphp

@section('subcontent')
    @foreach($fieldOnForm as $item)
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text($item, in_array($item, $foreignKey) ? $data->{substr($foreignKey[0],0,strlen($foreignKey[0])-3)}->name : $data->$item,['id' => $item, 'disabled' => true]) }}
                {{ Form::label($item, ucwords(in_array($item, $foreignKey) ? substr($foreignKey[0],0,strlen($foreignKey[0])-3) : $item)) }}
            </div>
        </div>
    @endforeach
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'customer.index'])
@endsection
