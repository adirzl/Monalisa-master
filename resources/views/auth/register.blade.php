@extends('layouts.auth')
@section('title', __('label.registration'))
@section('content')
    {{ Form::open(['url' => 'register', 'method' => 'post', 'name' => 'form-login', 'autocomplete' => 'off']) }}
    {{--<div class="row">--}}
        {{--<div class="input-field col s12">--}}
            {{--<h5 class="ml-4">{{ __('label.registration') }}</h5>--}}
            {{--<p class="ml-4">Join to our community now !</p>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix pt-2">fingerprint</i>
            {{ Form::text('username', null) }}
            <label for="username" class="center-align">username</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix pt-2">person_outline</i>
            {{ Form::text('name', null) }}
            <label for="name" class="center-align">Name</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix pt-2">mail_outline</i>
            {{ Form::email('email', null) }}
            <label for="email">Email</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix pt-2">lock_outline</i>
            {{ Form::password('password', null) }}
            <label for="password">Password</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix pt-2">lock_outline</i>
            {{ Form::password('password_confirmation', null) }}
            <label for="password_confirmation">Password again</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('button.register') }}</button>
        </div>

    </div>
    <div class="row">
        <div class="input-field col s12">
            <p class="margin medium-small"><a href="{{ route('login') }}">{{ __('label.already_have_an_account') }}</a></p>
        </div>
    </div>
    {{ Form::close() }}
@endsection
