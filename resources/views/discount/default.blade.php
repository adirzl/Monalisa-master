@php($createRoute = 'discount.create')
@extends('layouts.templates.default')
@section('title', ucwords('discount'))
@section('subtitle', 'Discount List')
@section('filter_panel')
    @include('discount.filter')
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
                    {!! default_standard_controll('discount',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    @if($header == 'status')
                        <td>{{ getOptionGroup('status')->where('key', $d->$header)->first()->value }}</td>
                    @else
                        <td>{{ $d->$header }}{{ $header == 'percentage' ? ' %' : '' }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
