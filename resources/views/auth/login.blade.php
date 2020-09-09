@extends('layouts.admin.auth')
@section('title', __('label.login'))
@section('content')
{{ Form::open(['url' => 'login', 'method' => 'post', 'name' => 'form-login', 'autocomplete' => 'off', 'class' => 'login-form']) }}

<div class="input-group mb-3">
    {{ Form::text('username', null, [ 'id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username' ]) }}
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    {{ Form::password('password', [ 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password' ]) }}
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<div class="row">
    <!-- <div class="col-8">
        <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
                Remember Me
            </label>
        </div>
    </div> -->
    <!-- /.col -->
    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </div>
    <!-- /.col -->
</div>

<div class="social-auth-links text-center mb-3">
    <p>@2020 KMT Hibah Sanitasi</p>
</div>

<!-- <div class="social-auth-links text-center mb-3">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
    </a>
    <a href="#" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
    </a>
</div>

<p class="mb-1">
    <a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
    <a href="register.html" class="text-center">Register a new membership</a>
</p> -->

{{ Form::close() }}
@endsection