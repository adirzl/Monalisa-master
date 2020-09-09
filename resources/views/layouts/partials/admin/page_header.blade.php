<div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m7 l7 breadcrumbs-left">
                <h5 class="breadcrumbs-title ml-1 mt-0 mb-0 display-inline hide-on-small-and-down">@yield('title')</h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@yield('title')</a>
                    </li>
                    <li class="breadcrumb-item active">@yield('subtitle')</li>
                </ol>
            </div>
            <div class="col s2 m5 l5"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons">expand_more            </i><i class="material-icons right">arrow_drop_down</i></a>
                <ul class="dropdown-content" id="dropdown1" tabindex="0">
                    <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li tabindex="0"><a class="grey-text text-darken-2" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
