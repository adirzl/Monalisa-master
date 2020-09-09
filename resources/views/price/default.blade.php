@php($createRoute = 'price.create')
@extends('layouts.templates.default')
@section('title', ucwords('price'))
@section('subtitle', 'Price List')
@section('filter_panel')
    @include('price.filter')
@endsection
@php($foreignKey = ['outlet_id', 'product_id'])

@section('subcontent')
    <table class="responsive-table">
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
                    {!! default_standard_controll('price',$d, null, null, false) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ in_array($header, $foreignKey) ? $d->{substr($header, 0, strlen($header) - 3)}->name : ($header == 'price' || $header == 'vendor_price' ? 'Rp.'.number_format($d->$header) : $d->$header) }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
