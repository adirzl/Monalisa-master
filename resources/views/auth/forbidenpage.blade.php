@extends('layouts.admin.auth')
@section('title', __('label.forbiden_page'))
@section('content')
    {{ Form::open(['url' => '/auth/changepassword', 'method' => 'post', 'name' => 'form-changepassword', 'autocomplete' => 'off']) }}
        <div class="row margin">
            <div class="input-field col s12">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <a href="{{ url('/admin') }}" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('button.back') }}</a>
            </div>
        </div>
    {{ Form::close() }}
@endsection
