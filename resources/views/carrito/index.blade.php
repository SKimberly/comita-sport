@extends('layouts.master')

@section('titulo','Listar Productos')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de productos</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.productos.index') }}">Productos</a></li>
					<li class="breadcrumb-item active">Listar carrito</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('contenido')
<section class="content">
	<div class="container-fluid">
		<div class="card card-info">
			<div class="card-header" >
				<strong>Carrito de compras</strong>
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tabla-tallas">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Producto</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Precio</th>
									<th scope="col">Descuento</th>
									<th scope="col">Total</th>
								</tr>
							</thead>
							<tbody>
								@foreach($detalles as $key => $detalle)
								<tr>
									<td class="col-sm-1 col-md-1 text-center">{{ $detalle->id }}</td>
									<td class="col-md-6">
										<div class="media">
				                            <a class="thumbnail pull-left pr-2" href="#">
				                            	<img class="media-object" src="{{ asset($detalle->producto->detalleimagenurl) }}" style="width: 72px; height: 72px;">
				                            </a>
				                            <div class="media-body ">
				                                <h4 class="media-heading mb-0"><a href="#">{{ $detalle->producto->nombre }}</a></h4>
				                                <h5 class="media-heading mb-0"> Tallas
				                                	@foreach($detalle->tallas as $talla)
														{{ $talla->nombre }}
				                                	@endforeach
				                                </h5>
			                                	<span class="text-info">
			                                		<form method="post" action="{{ route('producto.carrito.delete', $detalle->id) }}">
														@method('DELETE') @csrf
														<span>Precio c/u: </span>
														<strong class="pr-3">{{ $detalle->producto->precio }} Bs.</strong>
														<button type="submit" class="btn btn-sm   btn-outline-danger">
															<i class="far fa-trash-alt"></i>
								                        </button>
													</form>
			                                	</span>
				                            </div>
				                        </div>
									</td>
									<td class="col-md-1" style="text-align: center">
			                        	<input type="email" class="form-control" id="exampleInputEmail1" value="{{ $detalle->cantidad }}">
			                        </td>
									<td class="col-sm-1 col-md-1 text-center">
										<strong>Bs. {{ $detalle->producto_precio }}</strong>
									</td>
									<td class="col-sm-1 col-md-1 text-center">
										<strong>Bs. {{ $detalle->descuento_pro }}</strong>
									</td>
									<td class="col-sm-1 col-md-1 text-right" style="color: #468847;
background-color: #dff0d8;
border: 1pxsolid #468847;">
										<strong>Bs. {{ $detalle->subtotal_bs	 }}</strong>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
			                    <tr>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td style="color: #468847;
background-color: #dff0d8;
border: 1px solid #d6e9c6;">
			                        	<h5>Subtotal<br>Estimated shipping</h5>
			                        	<h3>Total</h3>
			                        </td>
			                        <td class="text-right" style="color: #468847;
background-color: #dff0d8;
border: 1px solid #d6e9c6;">
			                        	<h5><strong>$24.59<br>$6.94</strong></h5>
			                        	<h3>$31.53</h3>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>
				                        <button type="button" class="btn btn-block btn-comita text-white">
				                            ENVIAR <i class="fas fa-cart-plus"></i>
				                        </button>
			                    	</td>
			                    </tr>
			                </tfoot>
						</table>
					</div>
			</div>
		</div>
	</div>
</section>
@endsection
