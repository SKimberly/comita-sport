@extends('layouts.master')

@section('titulo','Listar Categorias')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de Categorias</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.categorias') }}">Categorias</a></li>
					<li class="breadcrumb-item active">Listar</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection
@include('admin.categorias.create')
@section('contenido')

<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<button type="button" class="btn btn-comita text-white" data-toggle="modal" data-target="#modalCategoria">
				   <i class="fas fa-sitemap "></i> Crear Categoria
				</button>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-categoria">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Descripción</th>
									<th scope="col">Imágen</th>
									<th scope="col">Estado</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categorias as $key => $categoria)
								<tr>
									<th scope="row">{{ ++$key }}</th>
									<td>{{ $categoria->nombre }}</td>
									<td>{{ $categoria->descripcion }}</td>
									<td class="text-center">
										<img src="{{ asset($categoria->urlcate) }}" class="img-tam" alt="Categoria Foto">
									</td>
									<td>{{ $categoria->estado }}</td>

									<td>
										<a href="{{ route('admin.categorias.edit',$categoria->id) }}" class="btn btn-sm btn-block btn-comita text-white">
											Editar
										</a>
										<form method="post" action="{{ route('admin.categorias.delete', $categoria->id) }}">
											@method('DELETE') @csrf
											<button class="btn btn-sm btn-block btn-outline-comita" type="submit">
												Eliminar
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

@push('styles')

@endpush

@push('scripts')


@unless(request()->is('admin/categorias/*'))
<script>
    if(window.location.hash === '#create')
    {
       	$('#modalCategoria').modal('show');
    }
    $('#modalCategoria').on('hide.bs.modal', function(){
      //console.log('El modal se cierra');
      window.location.hash = '#';
    });
    $('#modalCategoria').on('shown.bs.modal', function(){
       $('#fullname').focus();
       window.location.hash = '#create';
    });

</script>
@endunless
@endpush
