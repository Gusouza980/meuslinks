@php
    
$usuario = \App\Models\Usuario::find(session()->get("usuario")["id"]);

@endphp

<!doctype html>
<html lang="pt-br">
    
<head>
        
        <meta charset="utf-8" />
        <title>Pingo - Painel Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        @toastr_css
        @yield("styles")
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{route('painel.index')}}" class="logo logo-dark">
                                {{--  <span class="logo-sm">
                                    <img src="{{asset('site/imagens/logo.png')}}" alt="" width="100">
                                </span>  --}}
                                <span class="logo-lg">
                                    <img class="" src="{{asset('admin/images/logo.png')}}" alt="" width="100">
                                </span>
                            </a>

                            <a href="{{route('painel.index')}}" class="logo logo-light">
                                {{--  <span class="logo-sm">
                                    <img src="{{asset('admin/images/logo-g.png')}}" alt="" style="max-width: 25px;">
                                </span>  --}}
                                <span class="logo-lg">
                                    <img class="" src="{{asset('admin/images/logo.png')}}" alt="" width="100">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars" style="color: white;"></i>
                        </button>

                    </div>

                    <div class="d-flex">

            
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="d-none d-xl-inline-block ms-1 text-white" key="t-henry">{{session()->get("usuario")["nome"]}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block text-white"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="background: black;">
                                <a class="dropdown-item text-danger" href="{{route('painel.sair')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled mt-3" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="fa fa-users menu-icon" aria-hidden="true"></i>
                                    <span key="t-dashboards">Usuários</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('painel.usuarios')}}" key="t-default">Cadastros</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="fas fa-user-circle menu-icon"></i>
                                    <span key="t-dashboards">Clientes</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('painel.clientes')}}" key="t-default">Cadastros</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <div class="col-6 text-start">
                                        <h4 class="mb-sm-0 font-size-18">@yield("titulo")</h4>
                                    </div>
                                    <div class="col-6 text-end">
                                        @yield("botoes")
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield("conteudo")                  
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Luis Gustavo de Souza Carvalho
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('admin/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>
        @toastr_js
        @toastr_render

        <!-- App js -->
        <script src="{{asset('admin/js/app.js')}}"></script>
        @yield("scripts")
    </body>

</html>