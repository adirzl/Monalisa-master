@php($createRoute = 'shipment.create')
@extends('layouts.templates.default')
@section('title', ucwords('shipment'))
@section('subtitle', 'Shipment List')
@section('filter_panel')
    @include('shipment.filter')
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
                    {!! default_standard_controll('shipment',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
