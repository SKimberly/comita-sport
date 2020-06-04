@extends('layouts.secundario')
@section('titulo','Lista de Productos')
@section('styles')
<style>
.row .col-md-4 {
        margin-bottom: 1em;
    }
    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
    }
    .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    .price {
            margin: 0;
        }
</style>
@endsection
@section('productos')
<section class="about-services" id="productos">
    <div class="contenedor" style="padding: 30px 0;">
        <h2 class="titulo" style="margin-bottom: 30px;">LISTA DE PRODUCTOS</h2>
        <div class="servicio-cont">
            <div class="card-deck row">
            @foreach($productos as $producto)
                <div class="servicio-ind col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="{{ $producto->favoritoimagenurl }}" class="card-img-top">
                            <h5 class="text-center"><b> {{ $producto->nombre }}</b></h5>
                            <p class="text-justify">
                              {{ $producto->descripcion }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="btn colorprin btn-block">VER</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection