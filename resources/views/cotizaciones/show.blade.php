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
@include('mensajes.create')
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
                        <strong>Total Bs.: </strong> {{ $cotizacion->precio }}
                      @else
                        <strong>Celular:</strong> {{ $cotizacion->user->telefono }}
                      @endif
                      <br/>
                      <strong>Estado: </strong> {{ $cotizacion->estado }}
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
                            <img class="media-object" src="{{ asset('img/cotizaciones/producto.svg') }}" style="width: 80px; height: 80px;">
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
                            <img class="media-object" src="{{ asset('img/cotizaciones/talla.svg') }}" style="width: 80px; height: 80px;">
                          </a>
                          <div class="media-body ">
                              <div class="product-talla">
                                  <div class="product-talla">
                                      <strong>Tallas:</strong>
                                      @foreach($cotizacion->tallas as $talla)
                                          <label class="checkbox-btn">
                                              <span class="btn btn-light-checkbox"> {{ $talla->nombre }} </span>
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
                            <img class="media-object" src="{{ asset('img/cotizaciones/material.svg') }}" style="width: 80px; height: 80px;">
                          </a>
                          <div class="media-body ">
                              <div class="product-talla">
                                  <div class="product-talla">
                                      <strong>Materianes:</strong>
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
                            <img class="media-object" src="{{ asset('img/cotizaciones/descripcion.svg') }}" style="width: 80px; height: 80px;">
                          </a>
                          <div class="media-body ">
                              <div class="product-talla">
                                  <strong>Descripción:</strong>
                                  <small class="text-justify text-sm-left text-muted">
                                    {{ $cotizacion->descripcion }}
                                  </small>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center p-2">
                  <button type="button" class="btn btn-comita text-white" data-toggle="modal" data-target="#crearMe">
                      <i class="fas fa-hand-holding-usd"></i> FIJAR PRECIO
                  </button>
              </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="card direct-chat direct-chat-warning shadow">
                <div class="card-header btn-comita text-white">
                    <h3 class="card-title">Mensajes</h3>
                    <div class="card-tools">
                      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning"> Cantidad: {{ $mensajes->count() }}</span>
                      </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="direct-chat-messages">
                        <div class="direct-chat-msg">
                            @foreach($mensajes as $mensaje)
                                @if(auth()->user()->id == $mensaje->envia)
                                    <div class="direct-chat-msg right bg-light" >
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">{{ $mensaje->recibidouser->fullname }}</span>
                                            <span class="direct-chat-timestamp float-left">{{ $mensaje->created_at->format('Y m H:i') }}</span>
                                        </div>
                                        <img class="direct-chat-img" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="message user image">
                                        <div class="direct-chat-text float-right">
                                          {{ $mensaje->contenido }}
                                        </div>
                                    </div>
                                @else
                                  <div class="direct-chat-msg left  " >
                                    <div class="direct-chat-infos clearfix ">
                                      <span class="direct-chat-name float-left">{{ $mensaje->recibidouser->fullname }}</span>
                                      <span class="direct-chat-timestamp float-right">{{ $mensaje->created_at->format('Y m H:i') }}</span>
                                    </div>
                                    <img class="direct-chat-img" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="message user image">

                                    <div class="direct-chat-text ">
                                        {{ $mensaje->contenido }}
                                    </div>
                                  </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer btn-comita">
                    <form action="{{ route('admin.mensajes.store') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="hidden" name="cotiuser_id" value="{{ $cotizacion->user_id }}">
                            <input type="hidden" name="cotizacion_id" value="{{ $cotizacion->id }}">
                            <input type="text" name="contenido" placeholder="Escriba su mensaje.." class="form-control">
                            <span class="input-group-append">
                              <button type="submit" class="btn" style="background-color: cyan;">ENVIAR</button>
                            </span>
                        </div>
                    </form>
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
  font-size: 10px !important;
  border-radius: 25px !important;
  /*-webkit-border-radius: 25px !important;*/
}
.direct-chat-messages {
  height: 500px;
}
</style>
@endpush

