@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'customer.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['customer.update', $data->{$data->getKeyName()}]; }
    $dropdownObj = ['province_id'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('customer'))
@section('subtitle', 'Form Customer')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    @if(in_array($item, $dropdownObj))
                        {{ Form::select($item, ${$item}, $data->$item,['id' => $item]) }}
                    @else
                        {{ Form::text($item,$data->$item,['id' => $item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'customer.index'])
    {{ Form::close() }}

@endsection
