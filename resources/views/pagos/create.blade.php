@extends('layouts.master')

@section('titulo','Enviar-Imagen')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="product-talla">
            	<strong>Enviar imagen del pedido:</strong>
                <label class="checkbox-btn mb-0">
                    <span class="btn btn-light-checkbox" > <h5>{{ $pedido->codigo }} </h5></span>
                </label>
            </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.aprobados') }}">Pedidos Aprobados</a></li>
            <li class="breadcrumb-item active">Enviar Imagen</li>
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
			 <strong>ENVIAR IMAGEN DEL DEPÓSITO DE PAGO</strong>
        </div>
        <form action="{{ route('admin.pagos.store') }}" method="POST" class="was-validated" enctype="multipart/form-data">
        	@csrf
        <div class="card-body">
        	<input type="hidden" name="tipo" value="{{ $tipo }}">
        	<div class="row justify-content-center">
            	<div class="col-md-5 ">
					<div class="card">
						<div class="card-body text-center">
							<img id="blah" src="https://via.placeholder.com/150" alt="Tu imagen" style="width: 280px;  height: 270px;" class="zoom" />
						</div>
						<div class="card-footer">
							<div class="custom-file">
							   <input id="imgInp" type="file" class="custom-file-input" name="foto">
							   <label for="imgInp" class="custom-file-label text-truncate">Seleccione una imagen</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
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
		                         <input type="number" class="form-control bg-light border-0" name="monto" min=0 value="{{  old('monto')}}" >
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
		                          <textarea class="form-control border-0 bg-light" rows="2" name="descripcion">{{ old('descripcion') }}</textarea>
		                      </div>
		                  </div>
		            </div>
					<hr class="mt-0 mb-5">
		            <div class="form-group row text-center">
		                  <div class="col-sm-6">
		                  	<a href="{{ route('admin.aprobados') }}" class="btn btn-outline-secondary"> CANCELAR</a>
		                  </div>
		                  <div class="col-sm-6">
	                  	    <button type="submit" class="btn btn-outline-primary"  >
				              	<i class="far fa-thumbs-up"></i>
				                ENVIAR
				            </button>
		                  </div>
		            </div>
		        </div>
	    	</div>
    	</div>
    	</form>
    </div>
  </div>
</section>
@endsection


@push('styles')
<style>
	img.zoom {
    width: 100%;
    height: auto;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
}

.transition {
    -webkit-transform: scale(1.8);
    -moz-transform: scale(1.8);
    -o-transform: scale(1.8);
    transform: scale(1.8);
}
</style>
@endpush

@push('scripts')
<script>
$('.custom-file-input').on('change', function() {
   let fileName = $(this).val().split('\\').pop();
   $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
<script>

function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });

</script>

<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });
});
</script>
@endpush





