@php($createRoute = 'user.create')
@extends('layouts.templates.default')
@section('title', ucwords('user'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('user.filter')
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
                    {!! default_standard_controll('user',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
