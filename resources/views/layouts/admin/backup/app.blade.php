<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! \Assets::css() !!}
        <link rel="stylesheet" href="{{ asset('css/admin/app.css', request()->isSecure()) }}">

        <title>@yield('title') :: {{ config('app.name') }}</title>
        <link rel="apple-touch-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
        <link href="" rel="stylesheet">
{{--        <link rel="stylesheet" href="{{ asset('css/app_vue.css', (request()->isSecure() ? true : null))  }}">--}}
    </head>
    <!-- END: Head-->
    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 2-columns  " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">

        <!-- BEGIN: Header-->
        <header class="page-topbar" id="header">
            <div class="navbar navbar-fixed">
                <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-purple-deep-orange gradient-shadow">
                    @include('layouts.partials.admin.header')
                </nav>
            </div>
        </header>
        <!-- END: Header-->

        <!-- BEGIN: SideNav-->
        <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
            @include('layouts.partials.admin.navbar')
        </aside>
        <!-- END: SideNav-->

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                @include('layouts.partials.admin.page_header')
                {{--<div class="content-wrapper-before blue-grey lighten-5"></div>--}}
                <div class="col s12">
                    <div class="container">
                        @include('layouts.partials.admin.message')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->

        <!-- BEGIN: Footer-->
        @include('layouts.partials.admin.footer')
        <!-- END: Footer-->

        <script src="{{ asset('js/admin/app.js', request()->isSecure()) }}"></script>
        <script src="{{ asset('app-assets/js/scripts/advance-ui-modals.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/admin/button.js', request()->isSecure()) }}"></script>
        {!! \Assets::js() !!}
    </body>
</html>
