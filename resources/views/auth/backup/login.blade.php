@extends('layouts.admin.auth')
@section('title', __('label.login'))
@section('content')
    {{ Form::open(['url' => 'login', 'method' => 'post', 'name' => 'form-login', 'autocomplete' => 'off', 'class' => 'login-form']) }}
        <div class="row margin">
            <div class="input-field col s12 plh-username">
                <i class="material-icons prefix pt-2">person_outline</i>
                {{ Form::text('username', null, [ 'id' => 'username' ]) }}
                <label for="username" class="center-align">Username</label>
            </div>
        </div>
        <div class="row margin">
            <div class="input-field col s12 plh-password">
                <i class="material-icons prefix pt-2">lock_outline</i>
                {{ Form::password('password', [ 'id' => 'password' ]) }}
                <label for="password">Password</label>
            </div>
        </div>
        <!--<div class="row">-->
        <!--    <div class="col s12 m12 l12 ml-2 mt-1">-->
        <!--        <p>-->
        <!--            <label>-->
        <!--                {{ Form::checkbox('remember', 1, null) }}-->
        <!--                <span>{{ __('label.rememberme') }}</span>-->
        <!--            </label>-->
        <!--        </p>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row">
            <div class="input-field col s12">
                {{--<a href="index.html" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('label.login') }}</a>--}}
                <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('label.login') }}</button>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l12 center">@2020 KMT Hibah Sanitasi
        <!--        <p class="margin medium-small"><a href="{{ url('/forbiden') }}">Register Now!</a></p>-->
        <!--    </div>-->
        <!--    <div class="input-field col s6 m6 l6">-->
        <!--        <p class="margin right-align medium-small"><a href="{{ url('forbiden') }}">{{ __('label.forgot_password') }}</a></p>-->
            </div>
        </div>
    {{ Form::close() }}
@endsection
