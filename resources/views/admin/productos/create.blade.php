@extends('layouts.master')

@section('titulo','Crear-Producto')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Nuevo Producto</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.productos.index') }}">Productos</a></li>
            <li class="breadcrumb-item active">Crear</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('contenido')
<section class="content">
    <div class="container-fluid">
		<form method="POST" action="{{ route('admin.productos.store') }}" class="was-validated">
			@csrf
	        <div class="card card-info">
	        	<div class="btn-comita">nuevo producto</div>
		        <div class="card-body">
					<div class="row bg-light">
			        	<div class="col-md-7">
			                <div class="form-group row">
						        <label for="nombre" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Nombre:') }}</strong></label>
						        <div class="col-sm-8">
									<input type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : 'border-1' }}" id="nombre" name="nombre" placeholder="Nombre del nuevo producto" value="{{ old('nombre') }}" required>
					                @if ($errors->has('nombre'))
							            <span class="invalid-feedback" role="alert">
							                    <strong>{{ $errors->first('nombre') }}</strong>
							            </span>
							        @endif
						        </div>
						    </div>
			            </div>
			            <div class="col-md-5">
							<div class="form-group row">
					            <label for="categoria" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Categoria:') }}</strong></label>
					            <div class="col-sm-8">
									<select class="form-control select2 {{ $errors->has('categoria') ? ' is-invalid' : 'border-1' }}" name="categoria">
				                    	<option value="">Seleccione una opcion</option>
				                    	@foreach($categorias as $categoria)
											<option value="{{ $categoria->id }}"
											{{ old('categoria') == $categoria->id ? 'selected' : '' }}
											>{{ $categoria->nombre }}</option>
				                    	@endforeach
				                  	</select>
				                  	@if ($errors->has('categoria'))
						                <span class="invalid-feedback" role="alert">
						                    <strong>{{ $errors->first('categoria') }}</strong>
						                </span>
						            @endif
					            </div>
					        </div>
						</div>
					</div>
					<div class="row pt-4">
						<div class="col-md-7">
							<div class="form-group row">
						        <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Descripción:') }}</strong></label>
						        <div class="col-sm-8">
									<textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese la descripción del producto" >{{ old('descripcion') }}</textarea>
				                    @if ($errors->has('descripcion'))
						                <span class="invalid-feedback" role="alert">
						                    <strong>{{ $errors->first('descripcion') }}</strong>
						                </span>
						            @endif
						        </div>
						    </div>
			            </div>
			            <div class="col-md-5">
			                <div class="form-group row">
						        <label for="tallas" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Tallas:') }}</strong></label>
						        <div class="col-sm-8">
									<select class="form-control select2 {{ $errors->has('tallas') ? ' is-invalid' : 'border-1' }}" name="tallas[]" multiple="multiple" style="width: 100%;"   data-placeholder="Seleccione las tallas" style="width: 178px;">
										@foreach($tallas as $talla)
											<option {{ collect(old('tallas'))->contains($talla->id) ? 'selected' : '' }} value="{{ $talla->id }}">{{ $talla->nombre }}</option>
										@endforeach
					                </select>
					                @if ($errors->has('tallas'))
						                <span class="invalid-feedback" role="alert">
						                    <strong>{{ $errors->first('tallas') }}</strong>
						                </span>
						            @endif
						        </div>
						    </div>
			            </div>
			        </div>
			        <div class="row pt-4 bg-light">
			            <div class="col-md-7">
							<div class="form-group row">
						        <label for="precio" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Precio unitario:') }}</strong></label>
						        <div class="col-sm-8">
						        	<div class="input-group">
					                <input type="number" name="precio" step="0.01" class="form-control {{ $errors->has('precio') ? ' is-invalid' : 'border-1' }}" value="{{ old('precio') }}" required>
					                <div class="input-group-prepend">
					                    <span class="input-group-text">Bs.</span>
					                </div>
					                @if ($errors->has('precio'))
						                <span class="invalid-feedback" role="alert">
						                    <strong>{{ $errors->first('precio') }}</strong>
						                </span>
						            @endif
					            	</div>
						        </div>
						    </div>
			            </div>
			        	<div class="col-md-5">
							<div class="form-group row">
						        <div class="col-sm-12">
									<div class="input-group">
						            	<div class="input-group-prepend">
						                    <span class="input-group-text">Stock:</span>
						                </div>
					                	<input type="number" name="stock" class="form-control {{ $errors->has('stock') ? ' is-invalid' : 'border-1' }}" value="{{ old('stock') }}" required>
					                	<div class="input-group-append">
					                    	<span class="input-group-text"> Cantidad</span>
					                	</div>
						                @if ($errors->has('stock'))
							                <span class="invalid-feedback" role="alert">
							                    <strong>{{ $errors->first('stock') }}</strong>
							                </span>
							            @endif
					            	</div>
						        </div>
						    </div>
			        	</div>
			        </div>
			        <div class="row pt-4 bg-light justify-content-center">
		                <div class="col-md-10">
		                    <div class="form-group row">
						        <label for="fotos" class="col-sm-2 col-form-label text-md-right"><strong></strong>{{ __('Fotos:') }}</strong></label>
						        <div class="col-sm-10">
									<div class="dropzone btn-comita text-white"></div>
						        </div>
						    </div>
						</div>
			        </div>
			    </div>
	        </div>
	        <div id="accordion" >
				<div class="card">
				    <div class="btn-comita text-white text-center" id="headingThree">
				      <h5 class="mb-0">
				        <a class="btn text-white collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          ¿Desea añadir algún descuento?
				        </a>
				      </h5>
				    </div>
		    		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
		      			<div class="card-body">
		          			<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
							            <label for="descuento" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Descuento:') }}</strong></label>
							            <div class="col-sm-8">
											<input id="descuento" type="text" name="descuento" class="form-control {{ $errors->has('descuento') ? ' is-invalid' : 'border-1' }}" value="{{ old('descuento') }}">
											@if ($errors->has('descuento'))
								                <span class="invalid-feedback" role="alert">
								                    <strong>{{ $errors->first('descuento') }}</strong>
								                </span>
								            @endif
							            </div>
							        </div>
					            </div>
					            <div class="col-md-6">
									<div class="input-group">
						            	<div class="input-group-prepend">
						                    <span class="input-group-text">Cantidad:</span>
						                </div>
					                	<input type="number" name="cant_descuento" class="form-control {{ $errors->has('cant_descuento') ? ' is-invalid' : 'border-1' }}" value="{{ old('cant_descuento') }}" >
					                	<div class="input-group-append">
					                    	<span class="input-group-text"> Descuento</span>
					                	</div>
						                @if ($errors->has('cant_descuento'))
							                <span class="invalid-feedback" role="alert">
							                    <strong>{{ $errors->first('cant_descuento') }}</strong>
							                </span>
							            @endif
					            	</div>
								</div>
							</div>
		      			</div>
		    		</div>
		  		</div>
		  		<div class="card">
				    <div class="btn-comita text-white text-center" id="headingTwo">
				        <h5 class="mb-0">
					        <a class="btn text-white collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          ¿Desea añadir algúna oferta?
					        </a>
				        </h5>
					</div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
					        		<div class="form-group row">
								        <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Oferta:') }}</strong></label>
								        <div class="col-sm-8">
											<input name="oferta" type="checkbox" data-toggle="switch"  data-on-text="SI" data-off-color="danger" data-off-text="NO" data-handle-width="100" class="form-control {{ $errors->has('oferta') ? ' is-invalid' : 'border-1' }}" value="{{ old('oferta') }}">
											@if ($errors->has('oferta'))
								                <span class="invalid-feedback" role="alert">
								                    <strong>{{ $errors->first('oferta') }}</strong>
								                </span>
								            @endif
								        </div>
								    </div>
					        	</div>
					        	<div class="col-md-8">
					        		<div class="form-group row">
								        <label for="des_oferta" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Descripción de la oferta:') }}</strong></label>
								        <div class="col-sm-8">
											<textarea class="form-control {{ $errors->has('des_oferta') ? ' is-invalid' : 'border-1' }}" rows="2" name="des_oferta" id="des_oferta"  placeholder="Ingrese la descripción de la oferta" >{{ old('des_oferta') }}</textarea>
						                    @if ($errors->has('des_oferta'))
								                <span class="invalid-feedback" role="alert">
								                    <strong>{{ $errors->first('des_oferta') }}</strong>
								                </span>
								            @endif
								        </div>
								    </div>
					        	</div>
							</div>
						</div>
					</div>
			    </div>
		  	</div>
		  	<div class="row  justify-content-center">
	        	<button class="btn btn-outline-comita " type="submit" >
	        		GUARDAR PRODUCTO
	        	</button>
	        </div>
	    </form>
	</div>
</section>
@endsection

@push('scripts')
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript">
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: "classic",
    })

    $('#descuento').ionRangeSlider({
      min     : -0,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '%',
      prettify: false,
      hasGrid : true
    })

    $("[name='oferta']").bootstrapSwitch();


  })

 var myDropzone = new Dropzone('.dropzone', {
		url: '/admin/users/5/edit',
		paramName: 'foto',
		acceptedFiles: 'image/*',
		maxFilesize: 1,
		maxFiles: 3,
		headers: {
			'x-CSRF-TOKEN': '{{ csrf_token() }}'
		},
		dictDefaultMessage: 'Arrastra las fotos aquí para enviarlas',
		dictMaxFilesExceeded: 'Solo se permiten subir 3 imágenes.'
	});
	myDropzone.on('error', function(file, res){
		var msj = res.errors.foto[0];
		$('.dz-error-message:last > span').text(msj);
	});
	Dropzone.autoDiscover = false;


</script>
@endpush

