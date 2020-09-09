@php($createRoute = 'order.create')
@extends('layouts.templates.default')
@section('title', ucwords('order'))
@section('subtitle', 'Order List')
@section('filter_panel')
    @include('order.filter')
@endsection
@php($foreignKey = ['user_id'])
@php($paramField = ['ordertype', 'paymenttype', 'status'])

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
            @if(count($data))
                @foreach ($data as $d)
                    <tr>
                        <td>
                            <a href="{{ route('order.invoice',[$d->id])}}" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped" data-tooltip="View Detail"><i class="material-icons">search</i></a>
                        </td>
                        @foreach($fieldOnGrid as $header)
                            @if(isset($d->{$header}))
                                @if(in_array($header, $paramField))
                                    <td>{{ in_array($header, $paramField) ? ($header == 'status' ? $status_order[$d->{$header}] : ${$header}[$d->{$header}]) : $d->$header }}</td>
                                @else
                                    <td>{{ in_array($header, $foreignKey) ? $d->{substr($header, 0, strlen($header) - 3)}->name : $d->$header }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{count($fieldOnGrid) + 1}}">No Record(s) found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
