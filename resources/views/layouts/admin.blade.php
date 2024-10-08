<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Solocom | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-site/plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/admin-site/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin-site/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/admin-site/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/admin-site/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/admin-site/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-site/dist/css/adminlte.min.css">
  <!-- Scripts -->
  {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="nav-link user-panel d-flex" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="/admin-site/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="color:black">{{Auth::user()->full_name}}</a>
          </div>
        </div>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-center">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Profile
          </a>
          <a href="/" class="dropdown-item">
            <i class="fas fa-pen mr-2"></i> Client Area
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
            <i class="fas fa-users mr-2"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
        </div>                   
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="/admin-site/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Solocom</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin-site/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->full_name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('read-dashboard')
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @endcan
    
            <!-- Orders (check if user can read orders) -->
            @can('read-order')
            <li class="nav-item">
                <a href="/admin/orders" class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Orders</p>
                </a>
            </li>
            @endcan
    
            <!-- Products (check if user can read products) -->
            @can('read-product')
            <li class="nav-item">
                <a href="/admin/products" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cube"></i>
                    <p>Products</p>
                </a>
            </li>
            @endcan
    
            <!-- Stock (check if user can read stock) -->
            @can('read-stock')
            <li class="nav-item">
                <a href="/admin/stocks" class="nav-link {{ Request::is('admin/stocks*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-box"></i> <!-- Updated Icon -->
                    <p>Stock</p>
                </a>
            </li>
            @endcan

            <!-- Processors (check if user can read processors) -->
            @can('read-processor')
            <li class="nav-item">
                <a href="/admin/processors" class="nav-link {{ Request::is('admin/processors*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-microchip"></i>
                    <p>Processors</p>
                </a>
            </li>
            @endcan
    
            <!-- Brands (check if user can read brands) -->
            @can('read-brand')
            <li class="nav-item">
                <a href="/admin/brands" class="nav-link {{ Request::is('admin/brands*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Brands</p>
                </a>
            </li>
            @endcan
    
            <!-- Categories (check if user can read categories) -->
            @can('read-category')
            <li class="nav-item">
                <a href="/admin/categories" class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>Categories</p>
                </a>
            </li>
            @endcan
    
            <!-- Suppliers (check if user can read suppliers) -->
            @can('read-supplier')
            <li class="nav-item">
                <a href="/admin/suppliers" class="nav-link {{ Request::is('admin/suppliers*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-loading"></i>
                    <p>Suppliers</p>
                </a>
            </li>
            @endcan
    
            <!-- Users (check if user can read users) -->
            @can('read-user')
            <li class="nav-item">
                <a href="/admin/users" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            @endcan
    
            <!-- Roles (check if user can read roles) -->
            @can('read-role')
            <li class="nav-item">
                <a href="/admin/roles" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-key"></i>
                    <p>Roles</p>
                </a>
            </li>
            @endcan
        </ul>
    </nav>
    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer text-center">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2024 <a href="/admin/dashboard">Solocom</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin-site/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-site/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/admin-site/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables & Plugins -->
<script src="/admin-site/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-site/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-site/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-site/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin-site/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-site/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-site/plugins/jszip/jszip.min.js"></script>
<script src="/admin-site/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin-site/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin-site/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-site/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin-site/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-site/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
@yield('scripts')
</body>
</html>
