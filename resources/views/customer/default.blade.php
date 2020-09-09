@php($createRoute = 'customer.create')
@extends('layouts.templates.default')
@section('title', ucwords('customer'))
@section('subtitle', 'Customer List')
@section('filter_panel')
    @include('customer.filter')
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
                <td style="width:15%">
                    {!! default_standard_controll('customer',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $header == 'status' ? $status[$d->$header] : $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
