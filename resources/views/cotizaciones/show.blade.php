@extends('layouts.master')
@section('titulo','Ver-Cotización')
@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Cotización: {{ $cotizacion->codigo }}</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.cotizaciones.index') }}">Cotizaciones</a></li>
            <li class="breadcrumb-item active">Ver</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('contenido')
<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card card-widget shadow">
          <div class="card-header btn-comita text-white">
            <div class="user-block">
              <img class="img-circle" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="User Image">
                    <span class="username"><a href="#">{{ $cotizacion->user->fullname }}</a></span>
                    <span class="description" style="color: #fff;">Fecha: {{ $cotizacion->fecha ? $cotizacion->fecha->format('M d') : $cotizacion->updated_at->format('M d')}}</span>
                </div>
               <div class="card-tools" style="top: .8rem;">
                  @if($cotizacion->precio)
                    <strong>Total Bs.:</strong> {{ $cotizacion->precio }}
                  @else
                    <strong>Celular: </strong> {{ $cotizacion->user->telefono  }}
                  @endif
                </br>
                <strong>Estado: </strong> {{ $cotizacion->estado}}

                </div>
            </div>
            <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  @foreach($fotos as $key => $foto)
                    @if($key != 0)
                  <div class="carousel-item">
                     <img src="{{ url($foto->imagen) }}" alt="" class="d-block w-100" style="max-height: 250px !important;" >
                    </div>
                  @else
                    <div class="carousel-item active">
                        <img src="{{ url($foto->imagen) }}" alt="" class="d-block w-100" style="max-height: 250px !important;">
                    </div>
                  @endif
                @endforeach
              </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="card-footer card-comments">
            <div class="card-comment">
              <div class="media">
                  <a class="thumbnail pull-left pr-2" href="#">
                    <img class="media-object" src="{{ asset('img/cotizaciones/producto.svg') }}" style="width: 80px; height: 80px; ">
                  </a>
                  <div class="media-body ">
                      <div class="title_prodetalle">
                        <h1 style="font-size: 1em;" class="mb-0">
                          {{ $cotizacion->nombre }}
                        </h1>
                      </div>
                      <div class="product-talla">
                          <strong>Código:</strong>
                          <label class="checkbox-btn mb-0">
                              <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $cotizacion->codigo }} </span>
                          </label>

                      </div>
                  </div>
              </div>
            </div>

            <div class="card-comment">
                <div class="media">
                  <a class="thumbnail pull-left pr-2" href="#">
                    <img class="media-object" src="{{ asset('img/cotizaciones/talla.svg') }}" style="width: 80px; height: 80px; ">
                  </a>
                  <div class="media-body ">
                      <div class="product-talla">
                        <div class="product-talla">
                          <strong>Tallas:</strong>
                          @foreach($cotizacion->tallas as $talla)
                            <label class="checkbox-btn mb-0">
                                <span class="btn btn-light-checkbox" > {{ $talla->nombre }} </span>
                            </label>
                          @endforeach
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-comment">
                <div class="media">
                  <a class="thumbnail pull-left pr-2" href="#">
                    <img class="media-object" src="{{ asset('img/cotizaciones/material.svg') }}" style="width: 80px; height: 80px; ">
                  </a>
                  <div class="media-body ">
                      <div class="product-talla">
                        <div class="product-talla">
                          <strong>Materiales:</strong>
                          @foreach($cotizacion->materiales as $material)
                            <small class="text-justify text-sm-left">
                              {{ $material->nombre }}
                            </small>
                          @endforeach
                      </div>
                  </div>
              </div>
            </div>
          </div>
            <div class="card-comment">
                <div class="media">
                  <a class="thumbnail pull-left pr-2" href="#">
                    <img class="media-object" src="{{ asset('img/cotizaciones/descripcion.svg') }}" style="width: 80px; height: 80px; ">
                  </a>
                  <div class="media-body ">
                      <div class="product-talla">
                          <strong>Descripcion:</strong>
                          <small class="text-justify text-sm-left text-muted">
                            {{ $cotizacion->descripcion }}
                          </small>
                      </div>
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

@push('styles')
<style>
  .btn-light-checkbox{
    font-size: 10px !important;
    border-radius: 25px !important;
    /*webkit-border-radius: 25px !important;*/
  }
</style>
