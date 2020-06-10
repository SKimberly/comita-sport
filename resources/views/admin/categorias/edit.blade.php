@extends('layouts.master')
@section('titulo','Editar Categoria')
@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Editar Categoria</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.categorias') }}">Categorias</a></li>
					<li class="breadcrumb-item active">Editar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection
@section('contenido')
<section class="content">
	<div class="container-fluid">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
		<div class="card btn-comita">
			<div class="card-header" >
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.categorias.update', [$categoria->slug] ) }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
					@method('PUT') @csrf
		                <div class="form-group">
			                <label for="nombre">Nombre:</label>
			                <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
			                        id="nombre" name="nombre"
			                        placeholder="Ingrese el nombre de categoria" value="{{ old('nombre', $categoria->nombre) }}" required>
			                @if ($errors->has('nombre'))
			                        <span class="invalid-feedback" role="alert">
			                        	<strong>{{ $errors->first('nombre') }}</strong>
			                        </span>
			                @endif
		                </div>
		                <div class="form-group">
		                    <label for="descripcion">Descripción:</label>
		                    <input class="form-control bg-light shadow-sm {{ $errors->has('descripcion') ? ' is-invalid' : 'border-0' }}" id="descripcion"
		                        type="text"
		                        name="descripcion"
		                        placeholder="Ingrese una descipción" value="{{ old('descripcion', $categoria->descripcion) }}" required>
		                    @if ($errors->has('descripcion'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('descripcion') }}</strong>
		                        </span>
		                    @endif
		                </div>
		                <div class="form-group text-center">
		                	<img src="{{ $categoria->urlcate }}" class="img-fluid" style="width: 30%;"  alt="Categoria Foto">
		                </div>
						<div class="form-group">
							<label class="form-control-file" for="imagen" > Seleccione una imagen  </label>
							<input type="file" name="imagen" class="form-control-file" id="imagenes">
							<div class="invalid-feedback">La imagen no debe ser mayor a 1mb.</div>
						</div>
		                <button class="btn btn-block btn-comita text-white" type="submit" >
	                      ACTUALIZAR
	                    </button>
	                    <a href="{{ route('admin.categorias') }}" class="btn btn-block btn-outline-comita " >
	                      CANCELAR
	                    </a>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@endsection