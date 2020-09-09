@php($createRoute = 'product.create')
@extends('layouts.templates.default')
@section('title', ucwords('product'))
@section('subtitle', 'Product List')
@section('filter_panel')
    @include('product.filter')
@endsection
@php($foreignKey = ['category_id', 'unit_id'])

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
                    {!! default_standard_controll('product',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    @if(in_array($header,['status']))
                        <td>{{ $status[$d->$header] }}</td>
                    @elseif(in_array($header,['is_unlimited']))
                        <td>{{ $status_yesno[(int)$d->$header] }}</td>
                    @else
                        <td>{{ in_array($header, $foreignKey) ? getOptionGroup('product_'.substr($header, 0, strlen($header) - 3))->where('key', $d->$header)->first()->value : $d->$header }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
