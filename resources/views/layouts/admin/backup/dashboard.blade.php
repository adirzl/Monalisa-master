<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/admin/app.css', request()->isSecure()) }}">

        <title>Dashboard :: {{ config('app.name') }}</title>
        <link rel="apple-touch-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/logo/logo_pu.png')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        
        <!-- BEGIN: VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
        
        <!-- END: VENDOR CSS-->
        <!-- BEGIN: Page Level CSS-->
        <!--<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/materialize.css')}}">-->
        <!--<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/style.css')}}">-->
        <!--<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/style-horizontal.css')}}">-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
        <!-- END: Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
    
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

        <script src="{{asset('js/admin/app.js', request()->isSecure()) }}"></script>
        
        <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/scripts/data-tables.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
        {!! \Assets::js() !!}
    </body>
</html>
