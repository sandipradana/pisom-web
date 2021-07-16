<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - PISOM</title>

    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-jvectormap-2.0.5.css">
    <link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger text-sm">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.account.profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.auth.logout') }}" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.home.index') }}" class="brand-link navbar-danger">
                <img src="/adminlte/dist/img/AdminLTELogo.png" alt="PISOM" class="brand-image img-circle">
                <span class="brand-text font-weight-normal text-white" style="letter-spacing: .2rem">PISOM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info pl-4">
                    <a href="{{ route('admin.home.index') }}" class="d-block"><b>{{ auth()->guard('admin')->user()->name }}</b></a>
                    <a href="{{ route('admin.home.index') }}" class="d-block">{{ auth()->guard('admin')->user()->email }}</a>
                </div>
            </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-legacy nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @include('admin.menu-main', ['items' => $MainMenu->roots()])
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('title') <small>@yield('sub-title')</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            @yield('breadcrumb')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <footer class="main-footer text-sm">
            <div class="float-right d-none d-sm-inline">
                Pisom Team
            </div>
            <strong>Copyright &copy; 2020-2021 <a href="https://pisom.xyz">pizom.xyz</a>.</strong> All rights reserved.
        </footer>
    </div>
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- <script src="/adminlte/vendor/datatables/buttons.server-side.js"></script> -->
    <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-jvectormap-2.0.5.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.vmap.indonesia.js" charset="utf-8"></script>
    <script src="/adminlte/plugins/toastr/toastr.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    @stack('scripts')
    @if ($errors->any())
    <div class="alert alert-danger">
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}')
            @endforeach
        </script>
    </div>
    @endif
</body>

</html>