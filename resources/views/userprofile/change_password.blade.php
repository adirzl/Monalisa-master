@php($createRoute = 'userprofile.create')
@extends('layouts.templates.blank')
@section('title', ucwords('userprofile'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('userprofile.filter')
@endsection

@section('subcontent')
    {{ Form::model($data, ['route' => 'userprofile.changepassword', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
       
                    {{ Form::password('password', null, ['id' => 'password', 'class' => '']) }}
     
                
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'userprofile.index'])
    {{ Form::close() }}
@endsection
