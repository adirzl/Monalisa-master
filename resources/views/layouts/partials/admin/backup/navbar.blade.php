<div class="brand-sidebar">
    <h1 class="logo-wrapper">
        <a class="brand-logo darken-1" href="index.html">
            <img src="../../../app-assets/images/logo/logo_pu.png" alt="pu logo"/>
            <span class="logo-text hide-on-med-and-down">KMT-20</span>
        </a>
        <a class="navbar-toggler" href="#">
            <i class="material-icons">radio_button_checked</i>
        </a>
    </h1>
</div>
<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    {{--<li class="active bold">--}}
        {{--<a class="waves-effect waves-cyan active" href="/admin">--}}
            {{--<i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span>--}}
        {{--</a>--}}
    {{--</li>--}}
        <li class="bold-text gradient-45deg-light-blue-teal" style="height: 90px">
            <a class="waves-effect waves-cyan center" href="#" style="height: 90px"><span>Welcome back</span> 
                @if(in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID')]))
                <span class="badge grey-text text-darken-3 mt-5">{{auth()->user()->username}} - {{auth()->user()->name}}</span>
                @else
                <span class="badge grey-text text-darken-3 mt-0">{{auth()->user()->username}} - {{auth()->user()->name}} - {{isset(auth()->user()->area->name) ? auth()->user()->area->name :''}}</span>
                @endif
            </a>
        </li>

        {{-- <li>
            <a class="collapsible-body waves-effect waves-cyan " href="http://127.0.0.1:8080/story">
                <i class="material-icons">radio_button_unchecked</i> Story
            </a>
        </li> --}}
    {!! Navbar::render() !!}
</ul>
<div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

