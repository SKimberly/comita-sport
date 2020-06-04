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
<div class="container-fluid mt-50">
    <div class="row">
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye" style="color: Dodgerblue;"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye" style="color: Dodgerblue;"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye" style="color: Dodgerblue;"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card mb-30">
              <div class="ribbon ribbon-top-right"><span>50% OFF</span></div>
                <!--<div class="product-badge bg-secondary border-default text-body">Agotado</div>-->
                <div class="product-badge bg-nuevo border-default text-body">Nuevo</div>
                  <div class="product-thumb">
                    <img id="featured" src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" alt="toaster"/>
                    </div>
                    <ul class=" row justify-content-center product-image--list">
                      <li class="item-selected"><img src="http://ecx.images-amazon.com/images/I/71f3p1o62FL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71RE0VKOGlL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/81ArwBkmXYL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71TUY7pyVWL._SX522_.jpg" class="product-image--item"/></li>
                      <li><img src="http://ecx.images-amazon.com/images/I/71wQlvYuuHL._SX522_.jpg" class="product-image--item"/></li>
                    </ul>
                <div class="product-">
                    <!--<div class="product-category"><a href="#" data-abc="true">Sublimados</a></div>-->
                    <h3 class="product-title"><a href="#" data-abc="true"> Poleras de la Cerveceria</a></h3>
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
                    <a class="product-button btn-compare" href="#" data-abc="true">
                      <i class="">Bs. 150</i>
                      <span>Precio</span>
                    </a>
                    <a class="product-button" href="#" data-abc="true">
                      <i class="fas fa-eye"></i>
                      <span>Ver Detalles</span>
                    </a>
                    <a class="product-button btn-wishlist" href="#" data-abc="true">
                      <i class="fas fa-cart-plus"></i>
                      <span>Añadir al carrito</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
.tallas-css {
  text-align: left;
}
.checkbox-btn {
     position: relative
 }
 .checkbox-btn input {
     position: absolute;
     z-index: -1;
     opacity: 0
 }
 .checkbox-btn input:checked~.btn {
     border-color: #2193b0;
     background-color: #12d8fa;
     color: #fff
 }
 .btn-light-checkbox{
     display: inline-block;
     font-weight: 600;
     color: #343a40;
     text-align: center;
     vertical-align: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none;
     background-color: #eee;
     border: 1px solid #eee;
     padding: 0.20rem 0.65rem;
     font-size: 8px;
     line-height: 1.5;
     border-radius: 0.37rem
 }
/* nuevo arriba*/
.product-image--list {
  display: flex;
  justify-content: space-between;
  list-style-type: none;
  padding: 0;
}
.product-image--list li {
  margin: 0 5px;
  border: 2px solid #eaeaea;
  border-radius: 5px;
  -webkit-transition: all ease 0.25s;
  transition: all ease 0.25s;
}
.product-image--list li.item-selected {
  box-shadow: 1px 1px 1px #888888;
  border: 2px solid #12d8fa;
  -webkit-transition: all ease 0.25s;
  transition: all ease 0.25s;
}
.product-image--item {
  max-width: 40px;
  max-height: 40px;
}
/*****  otro card/***/
.ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute
}
.ribbon::before,
.ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #2980b9
}
.ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 8px 0;
    background-color: #FFC300;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    color: #fff;
    font: 100 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center
}
.ribbon-top-right {
    top: -10px;
    right: -10px
}
.ribbon-top-right::before,
.ribbon-top-right::after {
    border-top-color: transparent;
    border-right-color: transparent
}
.ribbon-top-right::before {
    top: 0;
    left: 17px
}
.ribbon-top-right::after {
    bottom: 17px;
    right: 0
}
.ribbon-top-right span {
    left: -25px;
    top: 30px;
    transform: rotate(45deg)
}
/******* Aqui el ultimo*///////////
.mt-50 {
    margin-top: 50px
}
.product-card {
    display: block;
    position: relative;
    width: 100%;
    border: 1px solid #e5e5e5;
    border-radius: 5px;
    background-color: #fff
}
.mb-30 {
    margin-bottom: 30px !important
}
.product-badge {
    position: absolute;
    height: 24px;
    padding: 0 14px;
    border-radius: 3px;
    color: #fff !important;
    font-size: 12px;
    font-weight: 400;
    letter-spacing: .025em;
    line-height: 24px;
    white-space: nowrap;
    top: 12px;
    left: 12px
}
.bg-secondary {
    background-color: #dc3545 !important
}
.bg-nuevo {
    background-color: #12c8fa !important
}
.product-thumb>img {
    display: block;
    width: 100%;
    height: 300px;
    padding: 14px
}
.product-category {
    width: 100%;
    margin-bottom: 6px;
    font-size: 12px
}
.product- {
    padding: 18px;
    padding-top: 15px;
    text-align: center
}
.product-category>a {
    transition: color .2s;
    color: #999;
    text-decoration: none
}
.product-title {
    margin-bottom: 18px;
    font-size: 16px;
    font-weight: normal
}
.product-title>a {
    transition: color .3s;
    color: #232323;
    text-decoration: none;
    color: #3ba9fc;
}
.product-price {
    display: inline-block;
    margin-bottom: 10px;
    padding: 3px 3px;
    border-radius: 4px;
    background-color: #12d8fa;
    color: #ffffff;
    font-size: 16px;
    font-weight: normal;
    text-align: center;
}
.product-button-group {
    display: table;
    width: 100%;
    border-top: 1px solid #e5e5e5;
    table-layout: fixed;
    background-color: #bff4ef;
}
.product-button-group a:hover {
    color: #3ba9fc
}
.product-button:first-child {
    border-bottom-left-radius: 5px
}
.product-button {
    display: table-cell;
    position: relative;
    height: 62px;
    padding: 10px;
    transition: background-color .3s;
    border: 0;
    border-right: 1px solid #e5e5e5;
    background: none;
    color: #505050;
    overflow: hidden;
    vertical-align: middle;
    text-align: center;
    text-decoration: none
}
.product-button:hover>span {
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
    opacity: 1
}
.product-button>span {
    display: block;
    position: absolute;
    bottom: 9px;
    left: 0;
    width: 100%;
    -webkit-transform: translateY(12px);
    -ms-transform: translateY(12px);
    transform: translateY(12px);
    font-size: 12px;
    white-space: nowrap;
    opacity: 0
}
.product-button>i,
.product-button>span {
    transition: all .3s
}
.product-button>i {
    display: inline-block;
    position: relative;
    margin-top: 5px;
    font-size: 18px
}
.product-button:hover>i {
    -webkit-transform: translateY(-10px);
    -ms-transform: translateY(-10px);
    transform: translateY(-10px)
}
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
@endpush