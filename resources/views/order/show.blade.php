@extends('layouts.templates.default')
@section('title', ucwords('order'))
@section('subtitle', 'Show Order')
@php
    $foreignKey = ['ordertype', 'paymenttype'];
@endphp

@section('subcontent')
    @foreach($fieldOnForm as $item)
        <div class="row">
            <div class="input-field col s12">
                {{ Form::text($item, in_array($item, $foreignKey) ? getOptionGroup('order_'.substr($item, 0, strlen($item)))->where('key', $data->$item)->first()->value : $data->$item,['id' => $item, 'disabled' => true]) }}
                {{ Form::label($item, ucwords(in_array($item, $foreignKey) ? substr($foreignKey[0],0,strlen($foreignKey[0])) : $item)) }}
            </div>
        </div>
    @endforeach
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'order.index'])
@endsection
