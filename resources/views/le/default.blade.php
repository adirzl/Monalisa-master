@php($createRoute = 'le.create')
@php($createPermission = 'create le')
@extends('layouts.templates.default')
@section('title', ucwords('LE'))
@section('subtitle', 'Default')
@section('filter_panel')
@include('le.filter')
@endsection

@section('subcontent')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            <th>UserName</th>
            <th>Name</th>
            <th>Email</th>
            <th>Kab/kot</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if(count($data))
        @foreach ($data as $d)
        <tr>
            <td>
                {!! default_standard_controll('le', $d) !!}
            </td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->area->name }}</td>
            <td>{{ isset($d->status) ? $status[$d->status] : '' }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">No. Record(s) Found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection