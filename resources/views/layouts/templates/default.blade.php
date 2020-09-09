@extends('layouts.admin.app')
@php($ignorePage = ['filter'])

@section('content')
@if((!request()->segment(2) && request()->segment(1) != 'report') || in_array(request()->segment(2), $ignorePage))
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Filter</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @yield('filter_panel')
                    <!-- /.form-group -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>
@endif
<!-- SELECT2 EXAMPLE -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">@yield('subtitle')</h3>
                </div>
                <div class="col md-2">
                    @if(isset($createPermission))
                    @can($createPermission)
                    @if((!request()->segment(2) && request()->segment(1) != 'baseline') || in_array(request()->segment(2), $ignorePage) || (request()->segment(1) == 'baseline' && in_array((string)auth()->user()->roles->first()->id, [ env('ADMIN_ID'), env('SUPERADMIN_ID')])))
                    <a href="{{ route($createRoute) }}" class="btn btn-success float-right" style="margin-top: 1%; margin-right: 1%"><i class="fas fa-plus"></i>Tambah</a>
                    @endif
                    @endcan
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @yield('subcontent')
                </div>

                @if((!request()->segment(2) && request()->segment(1) != 'report') || in_array(request()->segment(2), $ignorePage))
                <div class="row">
                    <div class="pagination pagination-sm m-0 float-right">
                        {{ $data->appends(array_except(request()->input(), '_token'))->setPath(url(strstr($createRoute,'.',true)))->links() }}
                    </div>
                    <div class="col md-2">
                        @if(isset($createPermission))
                        @can($createPermission)
                        @if((!request()->segment(2) && request()->segment(1) != 'baseline') || in_array(request()->segment(2), $ignorePage) || (request()->segment(1) == 'baseline' && in_array((string)auth()->user()->roles->first()->id, [ env('ADMIN_ID'), env('SUPERADMIN_ID')])))
                        <a href="{{ route($createRoute) }}" class="btn btn-success float-right" style="margin-bottom: 1%; margin-right: 2%"><i class="fas fa-plus"></i>Tambah</a>
                        @endif
                        @endcan
                        @endif
                    </div>
                </div>
                @endif
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<!-- <div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            @if((!request()->segment(2) && request()->segment(1) != 'report') || in_array(request()->segment(2), $ignorePage))
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Filter</div>
                            {{-- <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p> --}}
                            <div class="collapsible-body">
                                <span>
                                    @yield('filter_panel')
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <div class="card card card-default scrollspy">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m8 l8">
                            <h4 class="card-title">@yield('subtitle')</h4>
                            {{-- <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p> --}}
                        </div>
                        <div class="col s12 m4 l4">
                            @if(isset($createPermission))
                            @can($createPermission)
                            @if((!request()->segment(2) && request()->segment(1) != 'baseline') || in_array(request()->segment(2), $ignorePage) || (request()->segment(1) == 'baseline' && in_array((string)auth()->user()->roles->first()->id, [ env('ADMIN_ID'), env('SUPERADMIN_ID')])))
                            <div class="row">
                                <a href="{{ route($createRoute) }}" class="right waves-effect waves-light btn-small"><i class="material-icons left">add</i>Tambah</a>
                            </div>
                            @endif
                            @endcan
                            @endif
                        </div>
                        <div class="col s12">
                            @yield('subcontent')
                        </div>
                        @if((!request()->segment(2) && request()->segment(1) != 'report') || in_array(request()->segment(2), $ignorePage))
                        <div class="row">
                            <div class="col s12 m8 l8 mt-3">
                                {{ $data->appends(array_except(request()->input(), '_token'))->setPath(url(strstr($createRoute,'.',true)))->links() }}
                            </div>
                            <div class="col s12 m4 l4 mt-3">
                                @if(isset($createPermission))
                                @can($createPermission)
                                @if((!request()->segment(2) && request()->segment(1) != 'baseline') || in_array(request()->segment(2), $ignorePage) || (request()->segment(1) == 'baseline' && in_array((string)auth()->user()->roles->first()->id, [ env('ADMIN_ID'), env('SUPERADMIN_ID')])))
                                <a href="{{ route($createRoute) }}" class="right waves-effect waves-light btn-small"><i class="material-icons left">add</i>Tambah</a>
                                @endif
                                @endcan
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection