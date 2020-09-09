@php($createRoute = 'attendance.create')
@extends('layouts.templates.default')
@section('title', ucwords('attendance'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('attendance.filter')
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
            @if(count($data))
                @foreach ($data as $d)
                    <tr>
                        <td>
                            {!! default_standard_controll('attendance',$d) !!}
                        </td>
                        @foreach($fieldOnGrid as $header)
                            <td>{{ $d->$header }}</td>
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
