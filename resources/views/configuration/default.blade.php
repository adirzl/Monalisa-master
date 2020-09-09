@php($createRoute = 'configuration.create')
@php($createPermission = 'create configuration')
@extends('layouts.templates.default')
@section('title', ucwords('configuration'))
@section('subtitle', 'Default')
@section('filter_panel')
@include('configuration.filter')
@endsection

@section('subcontent')
<table>
    <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            @foreach($fieldOnGrid as $header)
            <th>{{ strtoupper($header) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>
                {!! default_standard_controll('configuration',$d) !!}
            </td>
            @foreach($fieldOnGrid as $header)
            <td>{{ $d->$header }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endsection