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
            <div class="product-card mb-30">
                @if($producto->descuento)
                <div class="ribbon ribbon-top-right">
                    <span>{{ $producto->descuento }}% DES</span>
                </div>
                @endif
                <div class="bbb_deals_title">{{ $producto->nombre }}</div>
                <div class="product-badge bg-nuevo border-default text-body"> <strong> {{ $producto->precio }} Bs. </strong></div>

                  <div class="product-thumb">
                    <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster"/>
                  </div>

                  <ul class=" row justify-content-center product-image--list">
                    @foreach($producto->fotos as $img)
                      <li class="item-selected">
                          <img src="{{ asset($img->imagen) }}" class="product-image--item"/>
                      </li>
                    @endforeach
                  </ul>

                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">{{ $producto->nombre }}</a></div>-->
                    <h3 class="product-title text-justify"><a href="#" data-abc="true" > {{ $producto->descripcion }}</a></h3>

                    <div class="tallas-css"><strong>Tallas:</strong>
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
                    <span class="product-button btn-compare" data-abc="true">
                      <input min="1" value="1" class="form-control" type="number">
                      <span >Cantidad</span>
                    </span>
                    <a class="product-button btn-wishlist" href="{{ route('admin.producto.detalles', [$producto->slug]) }}" data-abc="true">
                            <i class="fas fa-eye" style="color:#FFC300;"></i>
                        </button>
                        <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus" style="color:#FFC300;"></i>
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
</script>
<script>
$('#verDeta').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var pro_id = button.data('id')
    var pro_nom = button.data('nom')
    var pro_des = button.data('des')
    var pro_stock = button.data('stock')
    var pro_oferta = button.data('ofer')
    var modal = $(this)
    modal.find('.modal-body #proid').val(pro_id);
    modal.find('.modal-body #pronom').val(pro_nom);
    modal.find('.modal-body #prodes').val(pro_des);
    modal.find('.modal-body #prosto').val(pro_stock);
    modal.find('.modal-body #profer').val(pro_oferta);
})
</script>
<script>
    swal.fire({
      icon: 'success',
      title: 'Gracias por su visita!',
      showConfirmButton: false,
      timer: 2000
    })
</script>
@endpush