<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="../../../app-assets/images/logo/logo_pu.png" alt="Simpro Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">KMT-20</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('lte/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          @if(in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID')]))
          <span>{{auth()->user()->username}} - {{auth()->user()->name}}</span>
          @else
          <span>{{auth()->user()->username}} - {{auth()->user()->name}} - <br> {{isset(auth()->user()->area->name) ? auth()->user()->area->name :''}}</span>
          @endif
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {!! Navbar::render() !!}

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>