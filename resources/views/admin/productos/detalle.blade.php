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
        <div class="card shadow" >
            <div class="card-body">
              <div class="row">
                  <div class="col-md-5">
                      <div class="row photo-container-detalle my-3 shadow">
                          <div class="photo-main-detalle">
                              @if($producto->descuento)
                              <div class="ribbon ribbon-top-right">
                                  <span><strong>{{ $producto->descuento }}% DES</strong></span>
                              </div>
                              @endif
                              <div class="controls-detalle">
                                <i class="fas fa-share-alt" ></i>
                                <i class="fas fa-heart"></i>
                              </div>
                              <div class="product-thumb">
                                <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster"/>
                              </div>
                          </div>
                          <div class="justify-content-center btn-comita pt-3 pl-3 pr-3" style="border-radius: 5px;">
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
                  <div class="col-md-7">
                      <div class="cynta_estado">
                          <span> <strong> DISPONIBLE </strong> </span>
                      </div>
                      <div class="title_prodetalle">
                        <h1>{{ $producto->nombre }}</h1>
                        <span class="text-secondary">{{ $producto->codigo }}</span>
                      </div>
                      <div class="cynta_estado">
                          @if($producto->estado)
                            <span style="color:cyan;"> <strong> DISPONIBLE </strong> </span>
                          @else
                            <span style="color:red;"> <strong> AGOTADO </strong> </span>
                          @endif
                      </div>
                      <hr class="mt-0 mb-0">
                      <div class="precio_prodetalle  ">
                          <h2>
                            Bs. {{ $producto->precio }}
                          </h2>
                          <span class="text-muted">
                              Apartir de {{ $producto->cant_descuento }} Unid. Descuento del {{ $producto->descuento}} %.
                          </span>
                      </div>
                      <hr class="mt-0 mb-0">
                      <form method="POST" action="{{ route('producto.detalle.carrito', $producto->id) }}">
                          @csrf
                      <div class="subti_prodetalle">
                          <div class="form-group row">
                            <div class="col-sm-6">
                                <h3>TALLAS</h3>
                                <div class="product-talla">
                                    @foreach($producto->tallas as $talla)
                                    <label class="checkbox-btn">
                                      <input type="checkbox" name="tallas[]" value="{{ $talla->id }}" >
                                        <span class="btn btn-light-checkbox"> {{ $talla->nombre }} </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3>CATEGORÍA</h3>
                                <div class="product-talla">
                                    <label class="checkbox-btn">
                                        <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $categoria->nombre }} </span>
                                    </label>
                                </div>
                            </div>
                          </div>
                      </div>
                      <hr class="mt-0 mb-0">
                      <div class="subti_prodetalle">
                          <div class="form-group row">
                            <div class="col-sm-6">
                                <h3>DESCRIPCIÓN</h3>
                                <p class="text-justify">
                                    {{ $producto->descripcion }}
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <h3>¿Detallar?</h3>
                                <textarea class="form-control {{ $errors->has('especificacion') ? ' is-invalid' : 'border-1' }}" rows="1" name="especificacion" id="especificacion"  placeholder="¿Algún detalle de su producto?" >{{ old('especificacion') }}</textarea>
                            </div>
                          </div>
                      </div>
                      <hr class="mt-0 mb-0">
                      @if($producto->oferta)
                        <div class="subti_prodetalle  ">
                            <h3>OFERTA</h3>
                            <p class="text-justify">
                                {{ $producto->oferta }}
                            </p>
                        </div>
                        <hr class="mt-0 mb-0">
                      @endif
                      <div class="subti_prodetalle">
                          <div class="form-group row">
                            <div class="col-sm-6">
                                <h3>CANTIDAD</h3>
                                <div class="number-input">
                                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" > <i class="fas fa-minus" style="color:#0a2b4e;"></i>
                                  </button>
                                  <input class="quantity" min="1" name="cantidad" value="1" type="number">
                                  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"> <i class="fas fa-plus" style="color:#0a2b4e;"></i>
                                  </button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3>STOCK</h3>
                                <div class="product-talla">
                                    <label class="checkbox-btn" >
                                      <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $producto->stock }} Unid.</span>
                                    </label>
                                </div>
                            </div>
                          </div>
                      </div>
                      <hr class="mt-0 mb-2">
                      <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-3">
                          <button type="submit" class="btn btn-comita text-white btn-lg btn_deta_pro ">
                              <span style="color:cyan">
                                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                AÑADIR AL CARRITO
                              </span>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>
</section>
@endsection

@push('styles')
<style>
.btn-light-checkbox {
  font-size: 15px !important;
  border-radius: 25px !important;
  /*-webkit-border-radius: 25px !important;*/
}

.btn_deta_pro {
  border-radius: 25px !important;
}

.number-input.number-input {
    border: 1px solid cyan;
    background-color: #fff;
    border-radius: .25rem;
}

.number-input.number-input input[type="number"] {
    max-width: 5rem;
}

</style>
@endpush

@push('scripts')
<script type="text/javascript">
  $('.product-image--list li').hover(function() {
      var url = $(this).children('img').attr('src');
      $('.item-selected').removeClass('item-selected');
      $(this).addClass('item-selected');
      $('#featured').attr('src', url);
  });
</script>
@endpush



