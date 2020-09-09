<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') :: {{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css"> --}}
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/login.css"> --}}
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css"> --}}
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/admin/app.css', request()->isSecure()) }}">
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                        <div class="row">
                            <center><img src="{{asset('app-assets/images/logo/logo_pu.png')}}" style="width:20%; height:20%; margin-top:5%"><br>
                            KMT Hibah Sanitasi 2020</center>
                            <div class="input-field col s12">
                                <h5 class=" mt-0 center">@yield('title')</h5>
                            </div>
                            <div class="input-field col s12 mt-0 mb-0">
                                @include('layouts.partials.admin.message')
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin/app.js', request()->isSecure()) }}"></script>
  </body>
</html>
