@extends('layouts.master')

@section('titulo','Listar Usuarios')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark "> <strong> Ooops...! </strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Página no autorizada</li>
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
		<div class="text-center">
			<img src="{{ asset('img/403.jpg') }}" alt="pedidos" width="200" >
			<h1 class="m-0 text-dark "> <strong> Ooops...! PÁGINA NO AUTORIZADA</strong></h1>
		</div>
	</div>
</section>
<!-- Modal -->
@endsection
