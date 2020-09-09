@extends('layouts.admin.app')
@php($ignorePage = ['filter'])

@section('content')
    <div class="section">
        <div class="row">
            @yield('subcontent')
        </div>
    </div>
@endsection
