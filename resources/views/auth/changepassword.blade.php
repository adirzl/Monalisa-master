@extends('layouts.admin.auth')
@section('title', __('label.change_password'))
@section('content')
    {{ Form::open(['url' => '/auth/changepassword', 'method' => 'post', 'name' => 'form-changepassword', 'autocomplete' => 'off']) }}
        <div class="row margin">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                {{ Form::password('old_password') }}
                <label for="password">Old Password</label>
            </div>
        </div>
        <div class="row margin">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                {{ Form::password('new_password') }}
                <label for="password">New Password</label>
            </div>
        </div>
        <div class="row margin">
            <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                {{ Form::password('confirm_new_password') }}
                <label for="password">Confirm New Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--<a href="index.html" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('label.login') }}</a>--}}
                <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('label.save') }}</button>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 m6 l6">
                {{-- <p class="margin medium-small"><a href="{{ route('registration') }}">Register Now!</a></p> --}}
            </div>
            <div class="input-field col s6 m6 l6">
                {{-- <p class="margin right-align medium-small"><a href="user-forgot-password.html">{{ __('label.forgot_password') }}</a></p> --}}
            </div>
        </div>
    {{ Form::close() }}
@endsection
