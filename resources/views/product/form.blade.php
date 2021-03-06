@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'product.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['product.update', $data->{$data->getKeyName()}]; }
    $dropdownObj = ['category_id', 'unit_id'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('product'))
@section('subtitle', 'Form Product')

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
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'product.index'])
    {{ Form::close() }}

@endsection
