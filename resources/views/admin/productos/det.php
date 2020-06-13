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
    <div class="container-fluid col-md-10">
        <div class="product-detalle  shadow"><!--product-->
            <div class="producto_photo_detalle">
              <div class="photo-container-detalle">
                <div class="photo-main-detalle">
                  <div class="controls-detalle">
                    <i class="fas fa-share-alt" ></i>
                    <i class="fas fa-heart"></i>
                  </div>

                  <!--<img src="https://res.cloudinary.com/john-mantas/image/upload/v1537291846/codepen/delicious-apples/green-apple-with-slice.png" alt="green apple slice">-->
                  <div class="producto-thumb-detalle row justify-content-center">
                    <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster"/>
                  </div>
                </div>
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
            <div class="producto_info_detalle ">
              <div class="title_prodetalle">
                <h1>{{ $producto->nombre }}</h1>
                <span>{{ $producto->codigo }}</span>
              </div>
              <div class="price_prodetalle">
                Bs. <span>{{ $producto->precio }}</span>
              </div>
              <div class="description_prodetalles">
                <h3>TALLAS</h3>
                  <div class="tallas-css">

                  @foreach($producto->tallas as $talla)
                       <label class="checkbox-btn">
                              <input type="checkbox">
                                <span class="btn btn-light-checkbox"> {{ $talla->nombre }} </span>
                            </label>
                  @endforeach
                  </div>
              </div>
              <div class="description_prodetalles">
                <h3>CATEGORIA</h3>
                  <div class="tallas-css">
                      <label class="checkbox-btn">
                          <input type="checkbox">
                            <span class="btn btn-light-checkbox"> {{ $categoria->nombre }} </span>
                        </label>
                  </div>
              </div>
              <div class="description_prodetalles">
                <h3>DESCRIPCION</h3>
                  <p>{{ $producto->descripcion }}</p>
              </div>
              <div class="description_prodetalles">
                <h3>OFERTA</h3>
                  <p>{{ $producto->oferta }}</p>
              </div>
              <button type="button" class="btn btn-comita text-white">AÑADIR AL CARRITO</button>
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

