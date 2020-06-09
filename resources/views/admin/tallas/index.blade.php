@extends('layouts.master')
@section('titulo','Listar Tallas')
@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de Tallas</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.tallas.index') }}">Tallas</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection
@section('contenido')
@include('admin.tallas.create')
@include('admin.tallas.edit')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<button type="button" class="btn btn-comita text-white"  data-toggle="modal" data-target="#modalTalla">
				   <i class="fas fa-sort-numeric-up"></i> Nueva Talla
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-tallas">
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
								@foreach($tallas as $key => $talla)
								<tr>
									<th class="text-center">{{ ++$key }}</th>
									<td class="text-center">{{ $talla->nombre }}</td>
									<td>{{ $talla->descripcion }}</td>
									<td class="text-center">{{ $talla->created_at->format('M d') }}</td>
									<td class="text-center">{{ $talla->estado ? 'Activo' : 'Baja' }}</td>
									<td class="text-center">
										<button type="button" class="btn btn-sm btn-comita text-white" data-tallaid="{{ $talla->id }}" data-myname="{{ $talla->nombre }}" data-mydescrip="{{ $talla->descripcion }}" data-toggle="modal" data-target="#editTalla">
										   <i class="fas fa-sort-numeric-up"></i> Editar
										</button>
										<form method="post" action="{{ route('admin.tallas.delete', [$talla->slug]) }}">
											@method('DELETE') @csrf
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
@unless(request()->is('admin/tallas/*'))
<script>
    if(window.location.hash === '#talla')
    {
       	$('#modalTalla').modal('show');
    }
    $('#modalTalla').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalTalla').on('shown.bs.modal', function(){
       $('#nombre').focus();
       window.location.hash = '#talla';
    });
</script>
@endunless
<script>
$('#editTalla').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var ta_id = button.data('tallaid')
	  var nombre = button.data('myname')
	  var descripcion = button.data('mydescrip')
	  var modal = $(this)
	  modal.find('.modal-body #talla_id').val(ta_id);
	  modal.find('.modal-body #nombre').val(nombre);
	  modal.find('.modal-body #descripcion').val(descripcion);
})
</script>
@endpush