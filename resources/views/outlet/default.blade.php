@php($createRoute = 'outlet.create')
@extends('layouts.templates.default')
@section('title', ucwords('outlet'))
@section('subtitle', 'Outlet List')
@section('filter_panel')
    @include('outlet.filter')
@endsection

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
                        <td style="width: 15%">
                            {!! default_standard_controll('outlet',$d) !!}
                        </td>
                        @foreach($fieldOnGrid as $header)
                            @if(in_array($header,['status']))
                                <td>{{ $status[$d->$header] }}</td>
                            @else
                                <td>{{ $d->$header }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ count($fieldOnGrid) + 1 }}">
                        No. Record(s) Found
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
