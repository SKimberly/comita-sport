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
                    <span class="btn btn-light-checkbox" > <h5>{{ $pedido->codigo }} </h5></span>
                </label>
            </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pedidos.index') }}">Pedidos</a></li>
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
    <div class="row justify-content-center">
        <div class="card card-widget shadow">
            <div class="card-header btn-comita text-white text-center">
				 <strong>VERIFICAR PAGO</strong>
            </div>
            <div class="card-body row">
            	<div class="col-md-6">
					<div class="img-thumbnail">
	                <img src="{{ url($verifypago->imagen ) }}" alt="Imagen de pago" class="d-block w-100" style="max-height: auto !important;">
					</div>
				</div>
				<div class="col-md-6">
	                <div class="form-group row ">
	                  <label for="codigo" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Código del pedido:') }}</strong></label>
	                  <div class="col-sm-7">
	                      <div class="input-group">
	                          <input type="text" class="form-control bg-light border-0" name="codigo" value="{{ $pedido->codigo }}" readonly >
	                      </div>
	                  </div>
	                </div>
		            <hr class="mt-0 mb-3">
		            <div class="form-group row">
		                  <label for="monto" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Monto:') }}</strong></label>
		                  <div class="col-sm-7">
		                      <div class="input-group">
		                         <input type="number" class="form-control bg-light border-0" name="monto" value="{{ $verifypago->monto }}"  readonly >
		                          <div class="input-group-prepend">
		                                <span class="input-group-text">Bs.</span>
		                          </div>
		                      </div>
		                  </div>
		            </div>
		            <hr class="mt-0 mb-3">
		            <div class="form-group row">
		                  <label for="descripcion" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Descripción del pago:') }}</strong></label>
		                  <div class="col-sm-7">
		                      <div class="input-group">
		                          <textarea class="form-control border-0" rows="2" name="descripcion" readonly>{{ $verifypago->descripcion }}</textarea>
		                      </div>
		                  </div>
		            </div>
		            <form action="{{ route('admin.pagos.resverify') }}" method="POST">
		            	@csrf
		            @if($tipo === 'carrito')
		            	<hr class="mt-0 mb-3">
			            <div class="form-group row">
			                  <label for="fecha" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Fecha de entrega:') }}</strong></label>
			                  <div class="col-sm-7">
			                      <div class="input-group">
			                          <input class="form-control" type="date" name="fecha" value="{{ old('fecha') }}" required>
			                      </div>
			                  </div>
			            </div>
			         @endif
		            <hr class="mt-0 mb-3">
		            	<input type="hidden" name="tipo" value="{{ $tipo }}">
		            	<input type="hidden" name="tipo_id" value="{{ $pedido->id }}">
			            <div class="form-group row">
			                  <label for="respuesta" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('¿Responder?:') }}</strong></label>
			                  <div class="col-sm-7">
			                      <div class="input-group">
			                          <textarea class="form-control" rows="4" name="respuesta" >{{ old('respuesta') }}</textarea>
			                      </div>
			                  </div>
			            </div>
		        </div>
        	</div>
	        <div class="modal-footer">
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
    </div>
  </div>
</section>
@endsection





