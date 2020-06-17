@extends('layouts.secundario')

@section('titulo','Lista de Productos')

@push('styles')
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
</style>
@endpush



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
                    <form method="POST" action="{{ route('producto.detalle.carrito', $producto->id) }}">
                            @csrf
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
                                @foreach($producto->tallas as $talla)
                                    <label class="checkbox-btn">
                                      <input type="checkbox" name="tallas[]" value="{{ $talla->id }}" >
                                        <span class="btn btn-light-checkbox"> {{ $talla->nombre }} </span>
                                    </label>
                                @endforeach
                            </div>
                            @endguest
                        </div>
                        @guest
                        <div class="text-center btn-comita text-white">
                            <a href="{{ route('login') }}">
                                <strong style="color:cyan;">INGRESA AL SISTEMA</strong>
                            </a>
                        </div>
                        @else
                        <div class="product-button-group">
                            <span class="product-button btn-wishlist input-group-sm" data-abc="true">
                              <div class="number-input">
                                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" > <i class="fas fa-minus" style="color:#0a2b4e;"></i>
                                  </button>
                                  <input class="form-control" min="1" name="cantidad" value="1" type="number">
                                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"> <i class="fas fa-plus" style="color:#0a2b4e;"></i>
                                  </button>
                              </div>
                            </span>
                            <a class="product-button btn-compare" href="{{ route('admin.producto.detalles', [$producto->slug]) }}" target="__blanck" data-abc="true">
                                <i class="fas fa-eye" style="color:cyan;"></i>
                                <span>Ver Detalles</span>
                            </a>
                            <a class="product-button" href="#" data-abc="true">
                              <i class="fas fa-cart-plus" style="color:cyan;"></i>
                              <span><button type="submit " class="btn btn-sm btn-comita p-0 pb-0" style="background-color: cyan; border-radius: 10px;">Añadir al carrito</button></span>
                            </a>
                        </div>
                    </form>
                        @endguest
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

