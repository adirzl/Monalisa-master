@php($createRoute = 'userpemda.create')
@php($createPermission = 'create userpemda')
@extends('layouts.templates.default')
@section('title', ucwords('userpemda'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('userpemda.filter')
@endsection

@section('subcontent')
    <table>
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
                        {!! default_standard_controll('userpemda',$d) !!}
                    </td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->area->name }}</td>
                    <td>{{ isset($d->status) ? $status[$d->status] : '' }}</td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="6">No. Record(s) Found</td></tr>
        @endif
        </tbody>
    </table>
@endsection
