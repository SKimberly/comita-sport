@extends('layouts.master')

@section('titulo','Crear-Producto')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Producto: {{ $producto->codigo }}</strong></h1>
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
    	<div class="row justify-content-center">
    		<div class="text-center col-md-10">
		    	@if($fotos->count())
				<div class="row row-cols-1 row-cols-md-3 p-2">
					@foreach($fotos as $foto)
					  <div class="btn-comita text-center p-2">
					  	<form method="POST" action="{{ route('producto.foto.delete',$foto->id) }}" class="">
					  		@csrf @method('DELETE')
					  		<button class="btn btn-danger btn-xs" style="position:absolute" type="submit"><i class="fas fa-times-circle"></i></button>
					      	<img src="{{ url($foto->imagen) }}" class="img-tam-edit" alt="...">
					    </form>
					  </div>
					@endforeach
				</div>
				@endif
			</div>
		</div>
		<form method="POST" action="{{ route('admin.productos.update',[$producto->slug]) }}" class="was-validated">
			@csrf @method('PUT')
	        <div class="card card-info">
	        	<div class="btn-comita">nuevo producto</div>
		        <div class="card-body">
					<div class="row bg-light">
			        	<div class="col-md-7">
			                <div class="form-group row">
						        <label for="nombre" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Nombre:') }}</strong></label>
						        <div class="col-sm-8">
									<input type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : 'border-1' }}" id="nombre" name="nombre" placeholder="Nombre del nuevo producto" value="{{ old('nombre',$producto->nombre) }}" required>
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
			                                   {{ old('categoria',$producto->categoria_id) == $categoria->id ? 'selected' : '' }}
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
									<textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese la descripción del producto" >{{ old('descripcion',$producto->descripcion) }}</textarea>
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
									<select class="form-control select2 {{ $errors->has('tallas') ? ' is-invalid' : 'border-1' }}" name="tallas[]" multiple="multiple" data-placeholder="Seleccione las tallas" >
										@foreach($tallas as $talla)
				                          <option {{ collect(old('tallas', $producto->tallas->pluck('id')))->contains($talla->id) ? 'selected' : '' }} value="{{ $talla->id }}">{{ $talla->nombre }}</option>
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
					                <input type="number" name="precio" step="0.01" class="form-control {{ $errors->has('precio') ? ' is-invalid' : 'border-1' }}" value="{{ old('precio', $producto->precio) }}" required>
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
					                	<input type="number" name="stock" class="form-control {{ $errors->has('stock') ? ' is-invalid' : 'border-1' }}" value="{{ old('stock', $producto->stock) }}" required>
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
						        <label for="fotos" class="col-sm-2 col-form-label text-md-right"><strong>{{ __('Fotos:') }}</strong></label>
						        <div class="col-sm-10">
									<div class="dropzone "></div>
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
				          ¿Desea añadir algún descuento u oferta?
				        </a>
				      </h5>
				    </div>
		    		<div id="collapseThree" class="collapse {{ ($producto->descuento || $producto->oferta) != '' ? 'show' : '' }}" aria-labelledby="headingThree" data-parent="#accordion">
		      			<div class="card-body">
		          			<div class="row">
								<div class="col-md-4">
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
					            <div class="col-md-4">
									<div class="input-group">
						            	<div class="input-group-prepend">
						                    <span class="input-group-text">Cantidad:</span>
						                </div>
					                	<input type="number" name="cant_descuento" class="form-control {{ $errors->has('cant_descuento') ? ' is-invalid' : 'border-1' }}" value="{{ old('cant_descuento',$producto->cant_descuento) }}" >
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
								<div class="col-md-4">
					        		<div class="form-group row">
								        <label for="oferta" class="col-sm-3 col-form-label text-md-right"><strong></strong>{{ __('Oferta:') }}</strong></label>
								        <div class="col-sm-9">
											<textarea class="form-control {{ $errors->has('oferta') ? ' is-invalid' : 'border-1' }}" rows="2" name="oferta" id="oferta"  placeholder="Ingrese la descripción de la oferta" >{{ old('oferta',$producto->oferta) }}</textarea>
						                    @if ($errors->has('oferta'))
								                <span class="invalid-feedback" role="alert">
								                    <strong>{{ $errors->first('oferta') }}</strong>
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
    	skin: "big",
        min: 0,
        max: 50,
        from: '{{ $producto->descuento }}',
 		postfix : '%',
	    step    : 1,
	    prettify: false,
	    hasGrid : true,
    })


  })

 var myDropzone = new Dropzone('.dropzone', {
		url: '/admin/productos/{{ $producto->id }}/fotos',
		paramName: 'foto',
		acceptedFiles: 'image/*',
		maxFilesize: 1,
		maxFiles: 4,
		headers: {
			'x-CSRF-TOKEN': '{{ csrf_token() }}'
		},
		dictDefaultMessage: 'Arrastra las fotos aquí para enviarlas',
		dictMaxFilesExceeded: 'Solo se permiten subir 4 imágenes.'
	});
	myDropzone.on('error', function(file, res){
		var msj = res.errors.foto[0];
		$('.dz-error-message:last > span').text(msj);
	});
	Dropzone.autoDiscover = false;


</script>
@endpush