<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de control Proceso RSL && MSL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Botstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- JQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.js') }}"></script>
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Sweetalert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ckeditor-->
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Sistema  de Gestión de visitas FIIS UNAS</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ url('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIS VISITAS FIIS-UNAS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @can('usuarios')
                            <li class="nav-item ">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon "><i class="bi bi-people "></i></i>
                                    <p>
                                        Usuarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('usuarios/create') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo Usuario</p>
                                        </a>
                                        inis
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('usuarios') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Usuarios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('ministeriost')
                            <li class="nav-item ">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon "><i class="bi bi-building "></i></i>
                                    <p>
                                        Ministerios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('ministerios/create') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo Ministerio</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('ministerios') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Ministerios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('miembrost')
                            <li class="nav-item ">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon "><i class="bi bi-file-person-fill "></i></i>
                                    <p>
                                        Miembros
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('miembros/create') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo miembro</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('miembros') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de miembros</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('asistenciasS')
                            <li class="nav-item ">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon "><i class="bi bi-calendar2-week "></i></i>
                                    <p>


                                        Asistencias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('asistencias/create') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Registrar asistencia</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('asistencias') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver asistencias</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan




                        @can('research_groups')
                        <li class="nav-item">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Representantes de Visita<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('visitor_representatives.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registrar Nuevo Representante</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listado de Represetantes de visita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('research_lines')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-stream"></i>
                                    <p>Visitas Pendientes<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Visitas Pendientes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Líneas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                       
                        @can('processes')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Visitas en proceso<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('processes.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo Proceso</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('processes.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Procesos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                     

                        @can('deliverables')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Visitas en Proceso<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo Entregable</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Entregables</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('phases')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-flag-checkered"></i>
                                    <p>Visitas culminadas<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nueva Fase</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Fases</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        

                        @can('student_phase_database_counts')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Visitas Canceladas<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nuevo Conteo</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Conteos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('student_phase_database_counts')
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="nav-icon fas fa-check-circle"></i>
                                    <p>Satisfaccion de las Vistias <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nueva Evaluación</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('visitor_representatives.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Evaluaciones</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <li class="nav-item ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon "><i class="bi bi-printer "></i></i>
                                <p>Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('asistencias/reportes') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asistencias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('asistencias/reportes') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
                                style="background-color:rgb(238, 25, 25)">
                                <i class="nav-icon ">
                                    <i class="bi bi-door-closed"></i>
                                </i> Cerrar Sesion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <div class="content">
                @yield('content')
            </div>


        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                El Diseño de Investigación I - RESEGTI
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2025 <a href="https://github.com/giovanni-pe">GK</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- Bootstrap 4 -->
    <script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dist/js/adminlte.min.js') }}></script>
    <!-- DataTable -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

</body>

</html>
