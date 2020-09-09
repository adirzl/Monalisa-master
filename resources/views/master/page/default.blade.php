@php($createRoute = 'page.create')
@php($createPermission = 'create page')
@extends('layouts.templates.default')
@section('title', 'Page')
@section('subtitle', 'Default')
@section('filter_panel')
    @include('master.page.filter')
@endsection

@section('subcontent')
    <table class="striped">
        <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            <th>Label</th>
            <th>URI</th>
            <th>Icon</th>
            <th>Parent</th>
            <th>Sequence</th>
            <th>Visible</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $d)
            <tr>
                <td>
                    {!! default_standard_controll('page',$d->id) !!}
                    <a href="{{ route('page.configuration',[$d->id]) }}" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1"><i class="material-icons">settings</i></a>
{{--                    <a href="{{ route('page.wizard',[$d->id]) }}" class="btn btn-warning">W</a>--}}
                </td>
                <td>{{ $d->label }}</td>
                <td>{{ $d->uri }}</td>
                <td>{{ $d->icon }}</td>
                <td>{{ $d->parent_id }}</td>
                <td>{{ $d->sequence }}</td>
                <td>{{ $d->visible }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
