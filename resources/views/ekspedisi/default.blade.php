@php($createRoute = 'ekspedisi.create')
@extends('layouts.templates.default')
@section('title', ucwords('ekspedisi'))
@section('subtitle', 'Ekspedisi List')
@section('filter_panel')
    @include('ekspedisi.filter')
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
                    {!! default_standard_controll('ekspedisi',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    @if($header == 'status')
                        <td>{{ $status[$d->$header] }}</td>
                    @else
                        <td>{{ $d->$header }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
