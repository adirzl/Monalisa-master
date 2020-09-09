@php($createRoute = 'cart.create')
@extends('layouts.templates.default')
@section('title', ucwords('cart'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('cart.filter')
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
                    {!! default_standard_controll('cart',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
