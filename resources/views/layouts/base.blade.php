<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Estacionamento')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @yield('style')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-white py-0 shadow-sm">
        <!-- Navbar Brand-->
        <div class="navbar-brand ps-3 d-flex align-items-center bg-dark" id="navbar-brand">
            <i style="cursor: pointer" onclick="window.location.href='/'" class="fa-solid fa-car"></i>
            <span class="ps-3">Estacionamento</span>
        </div>
        <!-- Sidebar Toggle-->
        <div class="ps-3" id="toggle">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars fa-xl"></i>
            </button>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">
                            Vagas
                        </div>

                        <a href="{{ route('precos.index') }}" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill-1-wave"></i></div>
                            Preço
                        </a>

                        <a href="{{ route('estadia.create') }}" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
                            Entrada
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer px-2">
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 pt-4">
                    <div class="mb-3">@yield('content-header')</div>

                    <div>
                        @yield('content')
                    </div>
                </div>
            </main>

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery-mask/jquery.mask.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
