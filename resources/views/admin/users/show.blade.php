@extends('layouts.master')
@section('titulo','Perfil/Usuario')
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
            <li class="breadcrumb-item active">Perfil de usuario</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('contenido')
<section class="content">
	<div class="container-fluid">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('/img/welcome/potosi2.jpg') center center;">
                <h3 class="widget-user-username text-right">{{ $user->fullname }}</h3>
                <h5 class="widget-user-desc text-right">Administrador</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="User Avatar">
              </div>
              <div class="card-footer btn-comita text-white">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Teléfono</h5>
                      <span class="description-text">{{ $user->telefono }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Email</h5>
                      <span class="description-text">{{ $user->email }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">Cédula</h5>
                      <span class="description-text">{{ $user->cedula }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              	<!-- /.card-header -->
              	<div class="card-body">



					<form method="POST" action="{{ route('admin.users.create', [$user->slug]) }}" class="">
						@method('PUT') @csrf
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
			                </div>
			                <div class="row justify-content-center">
			                <button class="btn btn-comita text-white" type="submit">
		                      ACTUALIZAR
		                    </button>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                    <a href="{{ route('admin') }}" class="btn   btn-outline-comita" >
		                      CANCELAR
		                    </a>
			                </div>
					</form>
               	</div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
<style>
.widget-user-header{
    background-position: center center !important;
    background-size: cover !important;
    height: 300px !important;
}
.widget-user .widget-user-image {
    /*position: absolute;*/
    top: 250px !important;
    /*left: 50%;
    margin-left: -45px;*/
}
</style>
@endpush