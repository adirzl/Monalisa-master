@php($createRoute = 'projects.create')
@extends('layouts.templates.default')
@section('title', ucwords('Weekly Progres'))
@section('subtitle', 'List Progres')
@section('filter_panel')
    @include('projects.filter')
@endsection

@section('subcontent')
    <table class="responsive-table">
        <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            @foreach($fieldOnGrid as $header)
                <th>{{ strtoupper($header) }}</th>
            @endforeach
            {{-- <th>ID BASELINE</th> --}}
            <th>NAMA</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data))
            @foreach ($data as $d)
                <tr>
                    <td>
                        {!! default_standard_controll('projects',$d) !!}
                    </td>
                    @foreach($fieldOnGrid as $header)
                        <td>{{ $d->$header }}</td>
                    @endforeach
                    {{-- <td>{{ $d->baseline_id }}</td> --}}
                    <td>{{ $d->baseline->nama }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">No Record(s) Found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
