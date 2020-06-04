<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sport La Comita</title>
        <meta name="description" content="Sistema de información bajo plataforma web para el control de ventas, pedidos y cotizaciones para la fabrica de ropa Sport La Comita de la ciudad de Potosí">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/img/welcome/sport.png') }}" />
        <script src="{{ asset('js/app.js') }}" ></script>
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
                    <div class="logo navbar-brand animate__animated animate__lightSpeedInLeft animate__faster">
                        <a href="/">
                        <img src="{{ asset('/img/welcome/logo.png') }}" alt="">
                        </a>
                    </div>
                    <ul class="enlaces navbar-nav  ml-auto mt-2 mt-lg-0 animate__animated animate__lightSpeedInRight animate__delay-1s" id="enlaces">
                        <li class="nav-item active">
                            <a href="/#producto" class="">PRODUCTOS</a>
                        </li>
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a href="/admin" role="button" class="text-white">
                                   {{ strtoupper(Auth::user()->fullname) }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="text-white"  href="">
                                <img src="{{ asset('img/shoppingcard.svg') }}" alt="pedidos" width="40" class="">
                              </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <section class="caratula" id="inicio">
                <div class="contenedor">
                    <div class="caratula-cont row">
                        <div class="container">
                            <div class="row justify-content-center">
                                @yield('saludo')
                                <div class="imgprin col-md-6 animate__animated animate__zoomInDown animate__delay-2s">
                                    <img src="{{ asset('/img/welcome/principal.svg') }}" alt="Tienda Comita" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             <div class="ola sus-clases"  ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-2.25,74.50 C256.20,250.16 247.74,-88.31 502.25,74.50 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </div>
        <main>
            @yield('productos')
        </main>
        <footer>
            <div class="contenedor-footer">
                <div class="content-foo">
                    <h4>Celular</h4>
                    <p>70462939</p>
                </div>
                <div class="content-foo">
                    <h4>E-mail</h4>
                    <p>sport.lacomita19@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>Dirección (Tienda)</h4>
                    <p>Calle Oruro Nro. 184</p>
                </div>
                <div class="content-foo">
                    <h4>Dirección (Taller)</h4>
                    <p>Calle América esq. San Alberto</p>
                </div>
            </div>
            <h2 class="titulo-final">&copy; S. Kimberly Marquina Ch. | UATF Potosí </h2>
        </footer>
    </div>
    </body>
</html>