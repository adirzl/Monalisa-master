@php($createRoute = 'task.create')
@extends('layouts.templates.default')
@section('title', ucwords('baseline'))
@php($addTitle = (auth()->user()->roles->first()->id == env('SURVEYOR_ID') ? auth()->user()->area->name : ''))
@section('subtitle', 'List Task Baseline '. $addTitle . '( Total: '.$data->total().' baseline )')
@section('filter_panel')
    @include('baseline.filter')
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
                <td>
                    {!! default_standard_controll('task',$d) !!}
                    @can('create project')
                        <a href="{{ route('projects.fill', $d->id) }}" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped" data-tooltip="Create Project"><i class="material-icons">assignment</i></a>
                    @endcan
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $header == 'status' ? (isset($status[$d->$header]) ? $status[$d->$header] : 'N/A') : $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        @else 
            <tr><td colspan="{{ count($fieldOnGrid) + 1 }}">No. Record(s) Found</td></tr>
        @endif
        </tbody>
    </table>
@endsection
