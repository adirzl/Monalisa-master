@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'attendance.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'put'; $action = ['attendance.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('attendance'))
@section('subtitle', 'Form')

@section('subcontent')

    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    @if($item == 'attendance_date')
                        {{ Form::text($item, $data->$item ? date('d/M/Y',strtotime($data->$item)) : date('d/M/Y',strtotime(\Carbon\Carbon::now())),['id' => $item, 'class' => 'datepicker']) }}
                    @elseif(in_array($item, ['check_in', 'check_out']))
                        {{ Form::text($item, $data->$item ? date('h:i A',strtotime($data->$item)) : $data->item,['id' => $item, 'class' => 'timepicker']) }}
                    @else
                        {{ Form::text($item,$data->$item,['id' => $item, 'class' => '']) }}
                    @endif

                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-warning" rel="save">Save</button>
        <a href="{{ route('attendance.index') }}" class="btn btn-danger">Back</a>
    {{ Form::close() }}

@endsection
