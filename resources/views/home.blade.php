@extends('layouts.master')

@section('titulo','La-Comita/Inicio')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <img src="{{ asset('/img/logo1.png') }}" alt="logo la comita" class="img-fluid float-right w-50 h-75">
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Categorias</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('contenido')
<div class="container-fluid ">
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4">
            <div class="card-home mb-30 shadow">
                @if($producto->descuento)
                <div class="ribbon ribbon-top-right">
                    <span><strong> {{ $producto->descuento }}% DES </strong></span>
                </div>
                @endif

                <div class="car_home_precio btn-comita">
                    <strong> {{ $producto->precio }} Bs. </strong>
                </div>

                  <div class="product-thumb">
                    <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster" />
                  </div>

                  <!--<ul class=" row justify-content-center product-image--list">
                    @foreach($producto->fotos as $img)
                      <li class="item-selected">
                          <img src="{{ asset($img->imagen) }}" class="product-image--item"/>
                      </li>
                    @endforeach
                  </ul>-->

                <div class="product_card_home">
                    <div class="product-nombre">
                      <a href="#" data-abc="true"><strong> {{ $producto->nombre }} </strong></a>
                    </div>
                    <div class="product-description text-justify">
                        <a href="#" data-abc="true" > {{ $producto->descripcion }}</a>
                    </div>

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
                </div>
                <div class="product-button-group">
                    <span class="product-button btn-wishlist input-group-sm" data-abc="true">

                      <div class="number-input">
                          <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" > <i class="fas fa-minus" style="color:#0a2b4e;"></i>
                          </button>
                          <input class="form-control" min="1" name="quantity" value="1" type="number">
                          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"> <i class="fas fa-plus" style="color:#0a2b4e;"></i>
                          </button>
                      </div>
                      <!--<span style="color:cyan;" >Cantidad</span>-->
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
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


@push('scripts')
<script>
  $('.product-image--list li').hover(function() {

      var url = $(this).children('img').attr('src');
      $('.item-selected').removeClass('item-selected');
      $(this).addClass('item-selected');
      $('#featured').attr('src', url);

  });
    swal.fire({
      icon: 'success',
      title: 'Gracias por su visita!',
      showConfirmButton: false,
      timer: 2000
    })
</script>
@endpush