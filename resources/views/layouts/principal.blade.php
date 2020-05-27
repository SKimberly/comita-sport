<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sport La Comita</title>
        <meta name="description" content="Sistema de información bajo plataforma web para el control de ventas, pedidos y cotizaciones para la fabrica de ropa Sport La Comita de la ciudad de Potosí">
        <meta name="author" content="Ing. Jorge Peralta">
        <meta name="keyword" content="Sistema web Sport La Comita Version 2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/img/welcome/sport.png') }}" />
        <script src="{{ asset('js/app.js') }}" ></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="app">
        <div class="navbar-header">
            <nav class="navbar-comita navbar fixed-top  navbar-expand-lg navbar-light shadow-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                    <div class="logo navbar-brand">
                        <a href="/">
                        <img src="{{ asset('/img/welcome/logo.png') }}" alt="">
                        </a>
                    </div>
                    <ul class="enlaces navbar-nav  ml-auto mt-2 mt-lg-0 " id="enlaces">
                        <li class="nav-item active">
                            <a href="#inicio" class="">INICIO</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#servicio" class="" >SERVICIO</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#producto" class="">PRODUCTOS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#opiniones" class="" >OPINIONES</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#nosotros" class="" >NOSOTROS</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#contacto" class="" >CONTACTO</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <section class="caratula">
                <div class="contenedor">
                    <div class="caratula-cont row">
                        @yield('saludo')
                        <div class="caratula-ind col-md-6">
                            <img src="{{ asset('/img/welcome/principal.svg') }}" alt="Tienda Comita" >
                        </div>
                    </div>
                </div>
            </section>
            <div class="ola" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-2.25,74.50 C256.20,250.16 247.74,-88.31 502.25,74.50 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </div>
        <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
            </div>
        </div>-->
    </div>
    </body>
</html>