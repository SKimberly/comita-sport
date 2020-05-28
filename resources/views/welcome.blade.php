@extends('layouts.principal')

@section('titulo','Sport La Comita')

@section('saludo')
<div class="caratula-ind col-md-6">
    <h1 class="text-white"> <b> "Sport La Comita" </b></h1>
    <span class="lead text-justify text-warning d-none d-sm-none d-md-block"  ><strong> Bienvenidos a nuestra página web, registrate para poder realizar pedidos y cotizaciones en linea y te contactaremos para coordinar la entrega, puedes realizar tus pedidos cuando estés seguro.</strong>
    </span>
    </h2>

    @if (Route::has('login'))
            {{-- "auth" verifica si se authentico el usuario--}}
            @auth
                <a href="{{ url('/admin') }}"  class="btn btn-lg  btn-outline-light" >INICIO</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-blog btn-light">INGRESAR</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-blog  btn-outline-light">REGISTRARSE</a>
                @endif
            @endauth
    @endif
</div>
@endsection