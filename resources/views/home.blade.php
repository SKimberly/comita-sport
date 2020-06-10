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
@include('admin.productos.detalle')
<div class="container-fluid mt-50">
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4">
            <div class="product-card mb-30">
              @if ($producto->descuento)
              <div class="ribbon ribbon-top-right"><span>{{ $producto->descuento }} % Des.</span></div>
              @endif
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">{{ $producto->precio }} Bs.</div>
                  <div class="product-thumb">
                    <img id="featured" src="{{ asset($producto->detalleimagenurl) }}" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="{{ asset($producto->allimagen) }}" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <div class="product-category"><a href="#" data-abc="true">{{ $producto->descripcion }}</a></div>
                    <h3 class="product-title"><a href="#" data-abc="true" >{{ $producto->nombre }}</a></h3>
                        <div>
                        </div>
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
                    <span class="product-button btn-compare" href="#" data-abc="true">
                      <input style="color: Dodgerblue;" value="1" class="form-control" type="number">
                      <span style="color:Dodgerblue;">Cantidad</span>
                    </span>
                    <span class="product-button" data-abc="true">
                        <button type="button" class="btn " data-nom="{{ $producto->nombre }}" data-des="{{ $producto->descripcion }}" data-stock="{{ $producto->stock }}"  data-ofer="{{ $producto->oferta }}" data-toggle="modal" data-target="#verDeta">
                            <i class="fas fa-eye" style="color: Dodgerblue;"></i>
                        </button>
                        <span style="color:Dodgerblue;">Ver Detalles</span>
                    </span>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus" style="color: Dodgerblue;"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@push('styles')
<style>

</style>
@endpush
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
    var pro_nom = button.data('nom')
    var pro_des = button.data('des')
    var pro_stock = button.data('stock')
    var pro_oferta = button.data('ofer')
    var modal = $(this)
    modal.find('.modal-body #pronom').val(pro_nom);
    modal.find('.modal-body #prodes').val(pro_des);
    modal.find('.modal-body #prosto').val(pro_stock);
    modal.find('.modal-body #profer').val(pro_oferta);

})
</script>
@endpush