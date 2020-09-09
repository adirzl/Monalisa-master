@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'optvalue.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['optvalue.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('optvalue'))
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    @if(in_array($item, ['opt_group_id']))
                        {{ Form::select($item, ${$item}, $data->$item,['id' => $item]) }}
                    @else
                        {{ Form::text($item,$data->$item,['id' => $item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-warning">Save</button>
    {{ Form::close() }}

@endsection
