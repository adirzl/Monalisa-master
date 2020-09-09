@php($createRoute = 'province.create')
@extends('layouts.templates.default')
@section('title', ucwords('province'))
@section('subtitle', 'Province List')
@section('filter_panel')
    @include('province.filter')
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
                <td style="width: 15%">
                    {!! default_standard_controll('province',$d,null,null,false) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
