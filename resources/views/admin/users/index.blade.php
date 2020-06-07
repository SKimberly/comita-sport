@extends('layouts.master')

@section('titulo','Listar Usuarios')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de Usuarios</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Usuarios</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('contenido')
@include('admin.users.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >

					<button type="button" class="btn-comita text-white" data-toggle="modal" data-target="#myModal">
				 	<i class="fas fa-user-check"></i> Nuevo Usuario
					</button>

			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-user">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Cédula</th>
									<th scope="col">Celular/Teléfono</th>
									<th scope="col">Correo Electrónico</th>
									<th scope="col">Rol</th>
									<th scope="col">Estado</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $key => $user)
								<tr>
									<th scope="row">{{ ++$key }}</th>
									<td>{{ $user->fullname }}</td>
									<td>{{ $user->cedula }}</td>
									<td>{{ $user->telefono }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->tipo}}</td>
									<td>{{ $user->activo ? 'Activo' : 'Baja'}}</td>
									<td class="text-center">

										<a href="{{ route('admin.users.edit',[$user->slug]) }}" class="btn btn-block btn-sm btn-comita text-white">
											Editar
										</a>
										<form method="post" action="{{ route('admin.users.delete', [$user->slug]) }}">
											@method('DELETE') @csrf
											<button class="btn btn-block btn-sm   btn-outline-comita " type="submit">
												Dar de baja
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $users->links() }}
					</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
@endsection

@push('scripts')
@unless(request()->is('admin/users/*'))
<script>
    if(window.location.hash === '#create')
    {
       	$('#myModal').modal('show');
    }
    $('#myModal').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#myModal').on('shown.bs.modal', function(){
       $('#fullname').focus();
       window.location.hash = '#create';
    });
</script>
@endunless
@endpush