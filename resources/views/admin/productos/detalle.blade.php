@extends('layouts.master')
@section('titulo','Listar Productos')
@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Detalle del producto</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.productos.index') }}">Productos</a></li>
            <li class="breadcrumb-item active">Detalle</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('contenido')
<section class="content">
    <div class="container-fluid">
      <div class="col-12 col-sm-10 col-lg-10 mx-auto">
          <div class="card shadow">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6 ">
                    <div class="row">
                      <div class="photo-container-detalle my-5">
                          <div class="photo-main-detalle">
                          <div class="controls-detalle">
                            <i class="fas fa-share-alt" ></i>
                            <i class="fas fa-heart"></i>
                          </div>
                          <div class="col-12 product-thumb">
                            <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster"/>
                          </div>
                          </div>
                          <div class="col-12">
                              <div class="row justify-content-center pt-3">
                                  <ul class="product-image--list">
                                      @foreach($producto->fotos as $img)
                                        <li class="item-selected">
                                            <img src="{{ asset($img->imagen) }}" class="product-image--item"/>
                                        </li>
                                      @endforeach
                                  </ul>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="title_prodetalle">
                      <h1>{{ $producto->nombre }}</h1>
                      <span>{{ $producto->codigo }}</span>
                    </div>
                    <div class="bg-light  py-2 px-3 mt-4 border-0">
                      <h2 class="mb-0">
                        Bs. {{ $producto->precio }}
                      </h2>
                      <h4 class="mt-0">
                        <div class="description_prodetalles">
                          <h3><small>
                          Apartir de {{ $producto->cant_descuento }} Unid. Descuento del {{ $producto->descuento}} %. </small></h3>
                      </h4>
                    </div>
                    <div class="description_prodetalles">
                        <h3>TALLAS</h3>
                        <div class="btn-group btn-group-toggle bg-light " data-toggle="buttons">
                          @foreach($producto->tallas as $talla)
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option"    >
                            <span class="text-sm">{{ $talla->nombre }}</span>
                          </label>
                          @endforeach
                        </div>
                    </div>
                    <div class="description_prodetalles">
                        <h3>CATEGORÍA</h3>
                        <div class="btn-group btn-group-toggle bg-light " data-toggle="buttons">
                          <label class="btn btn-default text-center">
                            {{ $categoria->nombre }}
                          </label>
                        </div>
                    </div>
                    <div class="description_prodetalles">
                        <h3>DESCRIPCION</h3>
                        <p class="bg-light  text-justify">
                            {{ $producto->descripcion }}
                        </p>
                    </div>
                    <div class="description_prodetalles">
                        <h3>OFERTA</h3>
                        <p class="bg-light  text-justify">
                            {{ $producto->oferta }}
                        </p>
                    </div>
                    <div class="description_prodetalles">
                        <h3>CANTIDAD</h3>
                        <input type="number" class="form-control col-md-6" min="1" value="1">
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-2">
                        <button class="btn btn-comita btn-lg   text-white">
                          <i class="fas fa-cart-plus fa-lg mr-2"></i>
                          AÑADIR AL CARRITO
                        </button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</section>
@endsection
@push('scripts')
<script>
  $('.product-image--list li').hover(function() {
      var url = $(this).children('img').attr('src');
      $('.item-selected').removeClass('item-selected');
      $(this).addClass('item-selected');
      $('#featured').attr('src', url);
  });
</script>
@endpush