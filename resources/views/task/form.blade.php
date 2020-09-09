@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'baseline.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['baseline.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('baseline'))
@section('subtitle', 'Form Baseline')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            @if($item != 'status')
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text($item,$data->$item,['id' => $item]) }}
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
            @endif
        @endforeach
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'baseline.index'])
    {{ Form::close() }}

@endsection
