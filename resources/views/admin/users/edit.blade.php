@extends('layouts.master')

@section('titulo', 'Editar-Usuario')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Editar usuario</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.users.index') }}">Usuarios</a></li>
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
				<form method="POST" action="{{ route('admin.users.update', [$user->slug]) }}" class="bg-white shadow rounded py-3 px-4">
					@method('PUT') @csrf
		                <div class="form-group">
			                <label for="fullname">Nombre completo:</label>
			                <input class="form-control bg-light shadow-sm {{ $errors->has('fullname') ? ' is-invalid' : 'border-0' }}"
			                        id="fullname" name="fullname"
			                        placeholder="Ingrese su nombre completo" value="{{ old('fullname',$user->fullname) }}" required>
			                @if ($errors->has('fullname'))
			                        <span class="invalid-feedback" role="alert">
			                        	<strong>{{ $errors->first('fullname') }}</strong>
			                        </span>
			                @endif
		                </div>
		                <div class="form-group">
		                    <label for="email">E-mail:</label>
		                    <input class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : 'border-0' }}" id="email"
		                        type="email"
		                        name="email"
		                        placeholder="Ingrese su correo eléctronico" value="{{ old('email',$user->email) }}" >
		                    @if ($errors->has('email'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('email') }}</strong>
		                        </span>
		                    @endif
		                </div>
		                <div class="form-group row">
			                <div class="col-md-6">
				                <label for="cedula">Cédula:</label>
				                <input class="form-control bg-light shadow-sm {{ $errors->has('cedula') ? ' is-invalid' : 'border-0' }}"
				                        id="cedula" name="cedula" type="number"
				                        placeholder="Cédula de identidad" value="{{ old('cedula',$user->cedula) }}" required>
				                @if ($errors->has('cedula'))
				                        <span class="invalid-feedback" role="alert">
				                        	<strong>{{ $errors->first('cedula') }}</strong>
				                        </span>
				                @endif
			                </div>
			                <div class="col-md-6">
				                <label for="telefono">Teléfono:</label>
				                <input class="form-control bg-light shadow-sm {{ $errors->has('telefono') ? ' is-invalid' : 'border-0' }}"
				                        id="telefono" name="telefono" type="number"
				                        placeholder="Teléfono o celular" value="{{ old('telefono',$user->telefono) }}" required>
				                @if ($errors->has('telefono'))
				                        <span class="invalid-feedback" role="alert">
				                        	<strong>{{ $errors->first('telefono') }}</strong>
				                        </span>
				                @endif
			                </div>
		                </div>
		                <div class="form-group row">
			                <div class="col-md-6">
				                <label for="password">Contraseña:</label>
				                <input class="form-control bg-light shadow-sm {{ $errors->has('password') ? ' is-invalid' : 'border-0' }}"
				                        id="password" name="password" type="password"
				                        placeholder="Clave o contraseña" value="{{ old('password') }}"  >
				                @if ($errors->has('password'))
				                        <span class="invalid-feedback" role="alert">
				                        	<strong>{{ $errors->first('password') }}</strong>
				                        </span>
				                @endif
			                </div>
			                <div class="col-md-6">
				                <label for="rol">Rol:</label>
				                <select class="form-control {{ $errors->has('rol') ? ' is-invalid' : 'border-1' }}" name="rol">
				                    {{-- @foreach($roles as $rol)
				                    	<option value="{{ $rol->name }}" {{ old('roles',$user->roles->first()->name) == $rol->name ? 'selected' : '' }}>{{ $rol->name }}</option>
				                    @endforeach  --}}

				                    <option value="Administrador" {{ $user->tipo === 'Administrador' ? 'selected' : '' }}>Administrador</option>
				                    <option value="Ventas" {{ $user->tipo == 'Ventas' ? 'selected' : '' }}>Ventas</option>
				                    <option value="Cliente" {{ $user->tipo == 'Cliente' ? 'selected' : '' }}>Cliente</option>
			                    </select>
				                @if ($errors->has('rol'))
				                        <span class="invalid-feedback" role="alert">
				                        	<strong>{{ $errors->first('rol') }}</strong>
				                        </span>
				                @endif
			                </div>
		                </div>
		                <button class="btn btn-block btn-comita text-white" type="submit" >
	                      ACTUALIZAR
	                    </button>
	                    <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-outline-comita">
	                      CANCELAR
	                    </a>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@endsection