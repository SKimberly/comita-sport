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
    <div class="contenedor p-0">
        <h2 class="titulo mb-5">LISTA DE PRODUCTOS</h2>
        <div class="servicio-cont">
            <div class="row">
                @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card-home mb-30 shadow">
                        @if($producto->descuento)
                        <div class="ribbon ribbon-top-right">
                            <span><strong> {{ $producto->descuento }}% DTO. </strong></span>
                        </div>
                        @endif

                        <div class="car_home_precio btn-comita">
                            <strong> {{ $producto->precio }} Bs. </strong>
                        </div>

                          <div class="product-thumb">
                            <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster" />
                          </div>

                        <div class="product_card_home">
                            <div class="product-nombre">
                              <a href="#" data-abc="true"><strong> {{ $producto->nombre }} </strong></a>
                            </div>
                            <div class="product-description text-justify">
                                <a href="#" data-abc="true" > {{ $producto->descripcion }}</a>
                            </div>
                            @guest
                            @else
                            <div class="product-talla">
                                <strong>Tallas:</strong>
                                <label class="checkbox-btn">
                                  <input type="checkbox">
                                    <span class="btn btn-light-checkbox"> XS </span>
                                </label>
                                <label class="checkbox-btn">
                                  <input type="checkbox">
                                    <span class="btn btn-light-checkbox"> SM </span>
                                </label>
                                <label class="checkbox-btn">
                                  <input type="checkbox">
                                  <span class="btn btn-light-checkbox"> XXL </span>
                                </label>
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                      <span class="btn btn-light-checkbox"> XXXL </span>
                                </label>
                            </div>
                            @endguest
                        </div>
                        @guest
                        <div class="text-center btn-comita text-white">
                            <a href="{{ route('login') }}">
                                    <strong style="color:cyan">INGRESA AL SISTEMA
                                    </strong>
                            </a>
                        </div>
                        @else
                        <div class="product-button-group">
                            <span class="product-button btn-wishlist input-group-sm" data-abc="true">
                              <div class="number-input">
                                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" > <i class="fas fa-minus" style="color:#0a2b4e;"></i>
                                  </button>
                                  <input class="form-control" min="1" name="quantity" value="1" type="number">
                                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"> <i class="fas fa-plus" style="color:#0a2b4e;"></i>
                                  </button>
                              </div>
                            </span>
                            <a class="product-button btn-compare" href="{{ route('admin.producto.detalles', [$producto->slug]) }}" target="__blanck" data-abc="true">
                                <i class="fas fa-eye" style="color:cyan;"></i>
                                <span>Ver Detalles</span>
                            </a>
                            <a class="product-button" href="#" data-abc="true">
                              <i class="fas fa-cart-plus" style="color:cyan;"></i>
                              <span>Añadir al carrito</span>
                            </a>
                        </div>
                        @endguest
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection