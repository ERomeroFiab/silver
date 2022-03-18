<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/brand/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Silver</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
        name="viewport">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    {{-- <link href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/now-ui-dashboard.min.css?v=1.1.0')}}" rel="stylesheet">

    {{-- datatables styles --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    {{-- custom links --}}
    @yield('custom_links_css')
    {{-- customcss --}}
    @yield('customcss')
</head>


<body class="sidebar-mini">
    <div class="wrapper">

        {{-- SIDEBAR --}}
        <div class="sidebar" data-color="green">
            <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini" title="Portal">
                    <img src="{{asset('assets/img/logo-md.png')}}">
                </a>
                <!--Nombre de la empresa-->
                <a href="#" class="simple-text logo-normal" title="SilverTool">Fiabilis</a>
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-neutral btn-round">
                        <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
                        <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default">
                <ul class="nav">

                    <li class="{{ request()->is('tablas/vista-buscar') ? 'active' : '' }}">
                        <a href="{{ route('vista_buscar') }}">
                            {{-- <span class="sidebar-mini-icon">{{ $loop->iteration }}</span> --}}
                            <p class="sidebar-normal">Buscar por RUT</p>
                        </a>
                    </li>
                    <hr>
                    @foreach (config('tablas') as $table_name => $columns)
                        <li class="{{ request()->is('tablas/vista/'.$table_name) ? 'active' : '' }}">
                            <a href="{{ route('vistas', ['table_name' => $table_name]) }}">
                                {{-- <span class="sidebar-mini-icon">{{ $loop->iteration }}</span> --}}
                                <p class="sidebar-normal">{{ $loop->iteration }}) {{ $table_name }}</p>
                            </a>
                        </li>
                    @endforeach
        
                </ul>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                    <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div>

        {{-- MAINPANEL --}}
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand"> Base de datos de Silvertool  </a>
                        {{-- <a class="navbar-brand">Portal Cliente</a> --}}
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">


                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navUserDropdown"
                                    data-toggle="dropdown">
                                    <!-- <img height="16" src="#"> -->
                                    <span class="mx-1">{{ auth()->user()->name }} ({{ auth()->user()->rol }}) </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navUserDropdown">
                                    <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="panel-header panel-header-sm"></div>

            <!-- Start Content -->
            <div class="content">
                @yield('content')
            </div> <!-- End Content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        © {{ date('Y') }}, Developed by <a href="https://www.fiabilis.cl/" target="_blank">Fiabilis</a>.
                    </div>
                </div>
            </footer>
        </div>


    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js?v=1645015120')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js?v=1645015120')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js?v=1645015120')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js?v=1645015120')}}"></script>
    <script src="{{asset('assets/js/now-ui-dashboard.min.js?v=1645015120')}}" type="text/javascript"></script>

    {{-- START-DATATBLES --}}
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    {{-- END-DATATBLES --}}

    {{-- Custom Scripts --}}
    @yield('customjs')
</body>

</html>