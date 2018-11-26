<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Control de Tickets |  {{Auth::user()->name}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <!-- CSS PANEL -->
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet" />
    <!-- DropZone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
  


    
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar-1.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Control de Tickets :3 
                    </a>
                    </div>
                <ul class="nav">
                    <li class="nav-item  ">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/perfil') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Perfil</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/altaAdmin') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Crear Admin</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/altaUsuario') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Crear Usuario</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/altaSucursal') }}">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Crear Sucursal</p>
                        </a>
                    </li>
                     <li>
                        <a class="nav-link" href="{{ url('/admin/altaDepartamento') }}">
                            <i class="nc-icon nc-bag"></i>
                            <p>Crear Depto</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/altaCargo') }}">
                            <i class="nc-icon nc-badge"></i>
                            <p>Crear Cargo</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/altaTicket') }}">
                            <i class="nc-icon nc-atom"></i>
                            <p>Crear Ticket</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/administradores') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Administradores</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/usuarios') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/tickets') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Tickets</p>
                        </a>
                    </li>
                     <li>
                        <a class="nav-link" href="{{ url('/admin/sucursales') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Sucursales</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/cargos') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Cargos</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/admin/departamentos') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Departamentos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <!--   -->
  

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#"> Hola {{Auth::user()->name}} </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                          

                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        
                                    <span class="no-icon">Cerrar Sesion</span>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
                        <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="">Hensa Distribuciones</a>, Hecho con ❤️ 
                        </p>
                    </nav>
                </div>

            </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>

<!--
            <div class="content">
                <div class="container-fluid">
                    @yield('content2')
                </div>
            </div>
-->


</html>