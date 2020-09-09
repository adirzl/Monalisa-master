@php($createRoute = 'pelaksana.create')
@php($createPermission = 'create pelaksana')
@extends('layouts.templates.default')
@section('title', ucwords('pelaksana'))
@section('subtitle', 'Default')
@section('filter_panel')
    {{-- include('pelaksana.filter') --}}
@endsection

@section('subcontent')
    <table>
        <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            <th>UserName</th>
            <th>Name</th>
            <th>Email</th>
            <th>Kab/kot</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data))
            @foreach ($data as $d)
                <tr>
                    <td>
                        {!! default_standard_controll('pelaksana', $d) !!}
                        @can('assigntask pelaksana')
                            <a href="{{ route('pelaksana.assigntask', ['id' => $d->id]) }}" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped" data-tooltip="Assign Task"><i class="material-icons">assignment</i></a>
                        @endcan
                    </td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->area->name }}</td>
                    <td>{{ isset($d->status) ? $status[$d->status] : '' }}</td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="6">No. Record(s) Found</td></tr>
        @endif
        </tbody>
    </table>
@endsection
