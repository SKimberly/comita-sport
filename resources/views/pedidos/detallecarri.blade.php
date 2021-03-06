@extends('layouts.master')

@section('titulo','Ver Pedido')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark"><strong>Código de pedido:</strong> {{ $carrito->codigo }} </h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item"> <a href="{{ route('admin.pedidos.index') }}">Pedidos</a></li>
					<li class="breadcrumb-item active">Ver pedido</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('contenido')
@include('pagos.pagocarri')
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header btn-comita text-white" >
				<div class="user-block">
					<label class="checkbox-btn mb-0" >
                        <span class="btn btn-light-checkbox bg-light" style="font-size: 15px;">
							<strong>Pedido de:{{ $carrito->user->fullname }}</strong>
						</span>
					</label>
				</div>
				<div class="card-tools" style="top: .8rem;">
					Estado del pedido:
					<label class="checkbox-btn mb-0" >
                        <span class="btn btn-light-checkbox" style="font-size: 15px; background-color: cyan;">{{ $carrito->estado }}</span>
                    </label>
                    @if($carrito->anticipo)
						Deuda:
						<label class="checkbox-btn mb-0" >
	                        <span class="btn btn-light-checkbox" style="font-size: 15px; background-color: cyan;">{{ $carrito->total_bs - $carrito->anticipo }} Bs.</span>
	                    </label>
                    @endif
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="tabla-tallas">
						<thead>
							<tr class="text-center">
								<th scope="col">#</th>
								<th scope="col">Producto</th>
								<th scope="col">Descripción del pedido</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detalles as $key => $detalle)
							<tr>
								<th scope="row" style="text-align: center">{{ ++$key }}</th>
								<td class="col-sm-6 col-md-6">
									<div class="media">
			                            <a class="thumbnail pull-left pr-2" href="#">
			                            	<img class="media-object" src="{{ $detalle->producto->detalleimagenurl }}" style="width: 80px; height: 80px; border:2px solid cyan;">
			                            </a>
			                            <div class="media-body ">
			                                <div class="title_prodetalle">
			                                	<h1 style="font-size: 1em;" class="mb-0">
			                                		{{ $detalle->producto->nombre }}
			                                	</h1>
			                                </div>
			                                <div class="product-talla">
						                        <strong style="font-size: 0.9em;">Tallas:</strong>
						                        @foreach($detalle->tallas as $talla)
						                            <label class="checkbox-btn mb-0">
						                                <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $talla->nombre }} </span>
						                            </label>
						                        @endforeach
						                    </div>
											<div class="product-talla">
												<span class="text-left">
													<strong style="font-size: 0.9em;">Precio c/u:</strong>
						                                <span class="pr-3"> {{ $detalle->producto->precio }} Bs. </span>
												</span>
												<span class="text-left">
													<strong style="font-size: 0.9em;">Cantidad:</strong>
						                                <span class="pr-3"> {{ $detalle->cantidad }} </span>
												</span>
											</div>
											<div class="product-talla">
												<span class="text-left">
													<strong style="font-size: 0.9em;">Precio:</strong>
						                                <span class="pr-3"> {{ $detalle->producto_precio }} Bs. </span>
												</span>
												<span class="text-left">
													<strong style="font-size: 0.9em;">Descuento:</strong>
						                                <span class="pr-3"> {{ $detalle->descuento_pro }} </span>
												</span>
											</div>
			                            </div>
			                        </div>
								</td>
								<td class="col-sm-4 col-md-4 text-justify" style="text-align: center">
		                        	{{ $detalle->especificacion }}
		                        	<div class="producto-talla right">
										<a href="{{ route('admin.producto.detalles', [$detalle->producto->slug]) }}" class="btn btn-sm   btn-outline-success " data-toggle="tooltip" data-placement="right" title="Ver producto." target="__blanck"  >
											<i class="far fa-eye"></i>
				                        </a>
		                        	</div>
		                        </td>
								<td class="col-sm-2 col-md-2 text-right btn-comita" style="background-color: #d9edf7;">
									<strong>Bs. {{ $detalle->subtotal_bs	 }}</strong>
								</td>
							</tr>
								@php
									$total = $total + $detalle->subtotal_bs;
								@endphp
							@endforeach
						</tbody>
						<tfoot>
		                    <tr>
		                        <td>   </td>
		                        <td>   </td>
		                        <td class="btn-comita text-right" style="background-color: #d9edf7;border: 1px solid #0a2b4e;">
		                        	<h5><strong>Total:</strong></h5>
		                        </td>
		                        <td class="text-right" style="background-color: #d9edf7;border: 1px solid #0a2b4e;">
		                        	<h4><strong> {{ $total }} Bs:</strong></h4>
		                        </td>
		                    </tr>
		                </tfoot>
					</table>
				</div>
			</div>
			@if($carrito->estado === 'Procesando')
			@can('viewAny', auth::user())
			<div class="card-footer row justify-content-center">
				<button type="button" class="btn  btn-success" data-carritoid="{{ $carrito->id }}" data-carritofecha="{{ $carrito->fecha_entrega ? $carrito->fecha_entrega->format('d M Y') : '' }}" data-toggle="modal" data-target="#pagarDeuda">
	                <i class="far fa-money-bill-alt"> </i> ¿Pagar?
	            </button>
	        </div>
	        @endcan
			@else
			@if($carrito->estado !== 'Finalizado')
			@can('viewAny', auth::user())
			<div class="card-footer row justify-content-center">
				<a href="{{ route('admin.aprobados.carriapro', [$carrito->id]) }}" class="btn btn-outline-success"  >
                    APROBAR
                </a>

                <span class="p-3"></span>
                <a href="{{ route('admin.aprobados.carrirepro', [$carrito->id]) }}" class="btn   btn-outline-danger"  >
                    RECHAZAR
                </a>
			</div>
			@endcan
			@endif
			@endif
		</div>
	</div>
</section>
@endsection


@push('scripts')
<script>
$('#pagarDeuda').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var ca_id = button.data('carritoid')
	  var ca_fe = button.data('carritofecha')
	  var modal = $(this)
	  modal.find('.modal-body #carrito_id').val(ca_id);
	  modal.find('.modal-body #fecha').val(ca_fe);
})
</script>
@endpush




