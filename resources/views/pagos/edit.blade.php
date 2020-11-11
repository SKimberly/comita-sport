@extends('layouts.master')

@section('titulo','Verificar-Pago')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="product-talla">
            	<strong>Pago del pedido:</strong>
                <label class="checkbox-btn mb-0">
                    <span class="btn btn-light-checkbox" > <h5>{{ $tipo === 'cotizacion' ? $pago->cotizacion->codigo : $pago->carrito->codigo }} </h5></span>
                </label>
            </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pagos.index') }}">pagos</a></li>
            <li class="breadcrumb-item active">Listar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('contenido')
<section class="content">
  <div class="container-fluid">

        <div class="card card-widget shadow">
            <div class="card-header btn-comita text-white text-center">
				 <strong>VERIFICAR PAGO</strong>
            </div>
            <div class="card-body ">
            	<div class="row justify-content-center">
            	<div class="col-md-5">
					<img src="{{ url($pago->imagen ) }}" alt="Imagen de pago" class="zoom-img" id="zoom_01" data-zoom-image="{{ url($pago->imagen ) }}"  style="width: 100%;">
				</div>
				<div class="col-md-7">
					<div class="form-group row ">
	                  <label for="nombre" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Nombre del cliente:') }}</strong></label>
	                  <div class="col-sm-8">
	                      <div class="input-group">
	                          <input type="text" class="form-control bg-light border-0" name="codigo" value="{{ $pago->user->fullname }}" readonly >
	                      </div>
	                  </div>
	                </div>
	                <div class="form-group row ">
	                  <label for="codigo" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Código:') }}</strong></label>
	                  <div class="col-sm-8">
	                      <div class="input-group">
	                          <input type="text" class="form-control bg-light border-0" name="codigo" value="{{ $tipo === 'cotizacion' ? $pago->cotizacion->codigo : $pago->carrito->codigo }}" readonly >
	                      </div>
	                  </div>
	                </div>
	                <div class="form-group row ">
	                  <label for="monto" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Monto:') }}</strong></label>
	                  <div class="col-sm-8">
	                      <div class="input-group">
	                         <input type="text" class="form-control bg-light border-0" name="monto" value="{{ $pago->monto }}"  readonly >
	                          <div class="input-group-prepend">
	                                <span class="input-group-text">Bs.</span>
	                          </div>
	                      </div>
	                  </div>
		            </div>
		            <div class="form-group row">
		                  <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Descripción del pago:') }}</strong></label>
		                  <div class="col-sm-8">
		                      <div class="input-group">
		                          <textarea class="form-control border-0" rows="2" name="descripcion" readonly>{{ $pago->descripcion }}</textarea>
		                      </div>
		                  </div>
		            </div>
		        <form action="{{ route('admin.pagos.resverify', $pago->id) }}" method="POST">
		        	@csrf @method('PUT')
		        	<input type="hidden" name="tipo" value="{{ $tipo }}">
		        	<input type="hidden" name="tipococa_id" value="{{ $tipo === 'cotizacion' ? $pago->cotizacion->id : $pago->carrito->id }}">
					<hr class="mt-0 mb-3">
		            @if($tipo === 'carrito')
		            	@if($pago->carrito->fecha_entrega)
			            	<div class="form-group row">
				                  <label for="fecha" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Fecha de entrega:') }}</strong></label>
				                  <div class="col-sm-8">
				                      <div class="input-group">
				                          <input class="form-control border-0" type="text"value="{{ old('fecha',$pago->carrito->fecha_entrega->format('M d Y')) }}" readonly>
				                      </div>
				                  </div>
				            </div>
				       	@else
				       		<div class="form-group row">
				                  <label for="fecha" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Fecha de entrega:') }}</strong></label>
				                  <div class="col-sm-8">
				                      <div class="input-group">
				                          <input class="form-control border-0" type="date" name="fecha"  value="{{ old('fecha') }}" >
				                      </div>
				                  </div>
				            </div>
				        @endif
			        @endif
		            <div class="form-group row">
		                <label for="respuesta" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Responda:') }}</strong></label>
		                <div class="col-sm-8">
		                      <div class="input-group">
		                          <textarea class="form-control " rows="2" name="respuesta">{{ old('respuesta') }}</textarea>
		                      </div>
		                </div>
		            </div>


					<button name="btnrespuesta" value="Aceptado" type="submit" class="btn btn-outline-success "  >
						<i class="far fa-thumbs-up"></i>
						ACEPTAR PAGO
					</button>

					<button name="btnrespuesta" value="Rechazado" class="btn btn-outline-danger " type="submit" >
						<i class="far fa-thumbs-down"></i>
						RECHAZAR PAGO
					</button>

				</form>

        </div>
    </div>
  </div></div></div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>
<script>
    $('#zoom_01').ezPlus();
</script>
@endpush





