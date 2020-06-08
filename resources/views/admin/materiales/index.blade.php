@extends('layouts.master')
@section('titulo','Listar Materiales')
@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de Materiales</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.materiales.index') }}">Materiales</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection
@section('contenido')
@include('admin.materiales.create')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<button type="button" class="btn btn-comita text-white" data-toggle="modal" data-target="#modalMaterial">
				   <i class="fas fa-sort-numeric-up"></i> Nuevo Material
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-material">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Descripción</th>
									<th scope="col">Creación</th>
									<th scope="col">Estado</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($materiales as $key => $material)
								<tr>
									<th class="text-center">{{ ++$key }}</th>
									<td class="text-center">{{ $material->nombre }}</td>
									<td>{{ $material->descripcion }}</td>
									<td class="text-center">{{ $material->created_at->format('M d') }}</td>
									<td class="text-center">{{ $material->estado ? 'Activo' : 'Baja' }}</td>
									<td class="text-center">
										<form method="post" action="{{ route('admin.materiales.delete', [$material->slug]) }}">
											@method('DELETE') @csrf
											<a href="{{ route('admin.materiales.edit',[$material->slug]) }}" class="btn btn-sm btn-comita text-white">
												Editar
											</a>
											<button class="btn btn-sm  btn-outline-comita" type="submit">
												Dar Baja
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('scripts')
@unless(request()->is('admin/materiales/*'))
<script>
    if(window.location.hash === '#mate')
    {
       	$('#modalMaterial').modal('show');
    }
    $('#modalMaterial').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalMaterial').on('shown.bs.modal', function(){
       $('#nombre').focus();
       window.location.hash = '#mate';
    });
</script>
@endunless
@endpush