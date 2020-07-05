@extends('layouts.master')

@section('titulo','Listar Ventas')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>VENTAS</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Listar ventas</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('contenido')

<section class="content">
	<div class="container-fluid">
		<div class="col-12 col-sm-12 col-lg-12 mx-auto">
			<div class="card card-widget widget-user">
              	<div class="widget-user-header text-white"
                   	style="background: url('/img/welcome/potosi2.jpg') center center;">
                	<h3 class="widget-user-username text-right">Nombre</h3>
                	<h5 class="widget-user-desc text-right">Administrador</h5>
              	</div>
              <div class="widget-user-image">
                <img style="border:none;" src="{{ asset('img/welcome/ventas.svg') }}" alt="User Avatar">
              </div>
                <div class="card-body bg-light pt-0" >
              		<div class="text-center p-2">
              			<strong>LISTA DE VENTAS</strong>
              		</div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item col-md-6 text-center" role="presentation">
					     <a class="nav-link active text-white" id="carritos-tab" data-toggle="tab" href="#carritos" role="tab" aria-controls="carritos" aria-selected="true">CARRITO DE COMPRAS</a>
					  </li>
					  <li class="nav-item col-md-6 text-center" role="presentation">
					    <a class="nav-link text-white" id="cotizaciones-tab" data-toggle="tab" href="#cotizaciones" role="tab" aria-controls="cotizaciones" aria-selected="false">COTIZACIONES</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="carritos" role="tabpanel" aria-labelledby="carritos-tab">
							<div class="p-2 text-center">
								<strong>Ventas del carrito de compras</strong>
							</div>
							<div class="table-responsive bg-light" >
								<table class="table" id="tabla-tallas">
									<thead style="background-color:#0a2b4e; color: cyan; ">
										<tr class="text-center">
											<th scope="col">#</th>
											<th scope="col">Nombre/Código</th>
											<th scope="col">Estado</th>
											<th scope="col">Pago</th>
											<th scope="col">Total</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($carritos as $key => $carrito)
										<tr>
											<td class="" style="text-align: center">{{ ++$key }}</td>
											<td class="col-sm-5 col-md-5">
												<div class="media">
						                            <a class="thumbnail pull-left pr-2" href="{{ route('admin.pedidos.show', [$carrito->id]) }}" target="_blanck">
						                            	<img class="media-object" src="{{ $carrito->carrito_detalles->first()->producto->detalleimagenurl }}" style="width: 70px; height: 70px; border:2px solid #1F2D3D;">
						                            </a>
						                            <div class="media-body ">
						                                <div class="title_prodetalle">
						                                	<h1 style="font-size: 1em;" class="mb-0  ">
						                                		{{ $carrito->user->fullname }}
						                                	</h1>
						                                </div>
						                                <div class="product-talla">
									                    	<strong>Entrega:</strong>
									                        <label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $carrito->fecha_entrega->format('M d') }} </span>
									                        </label>
									                    </div>
				                                        <div class="product-talla">
				                                            <strong>Cantidad:</strong>
															<label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $carrito->carrito_detalles->count() }} </span>
									                        </label>
							                        	</div>
						                            </div>
						                        </div>
											</td>
											<!--<td class="col-sm-1 col-md-1">
					                        	<strong>{{ $carrito->fecha_orden->format('M d') }} - {{ $carrito->fecha_orden->diffForHumans() }}</strong>
					                        </td>-->
											<td class="col-sm-2 col-md-2 text-center">
												<label class="checkbox-btn mb-0" >
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan; font-size: 15px;"> {{ $carrito->estado }} </span>
                                                </label>
                                                <div class="product-talla">
							                    	<strong>Codigo:</strong>
							                    	<small class="text-justify text-sm-left text-muted">
		                                                {{ $carrito->codigo }}
		                                            </small>
		                                        </div>
											</td>
											<td class="col-sm-1 col-md-1 text-center">
												@if($carrito->anticipo)
													<strong>Bs. {{ $carrito->anticipo }}</strong>
												@else
													<strong style="color:red;">Ninguno</strong>
												@endif
											</td>
											<td class="col-sm-2 col-md-2 text-center">
												<strong>Bs. {{ $carrito->total_bs }}</strong>
												@if($carrito->anticipo < $carrito->total_bs)
												<button type="button" class="btn btn-sm btn-outline-secondary" data-carritoid="{{ $carrito->id }}" data-toggle="modal" data-target="#pagarDeuda">
									                Deuda: {{ $carrito->total_bs - $carrito->anticipo }} Bs.
									            </button>
									            @endif

											</td>
											<td class="col-sm-1 col-md-1 text-white " >
											  	<a href="{{ route('admin.pedidos.show', [$carrito->id]) }}" class="btn btn-sm btn-block btn-comita" target="_blanck">
				                                    <span class="text-white">Detalles</span>
				                                </a>
				                                @if($carrito->anticipo < $carrito->total_bs)
					                                <button type="button" class="btn btn-sm  btn-block btn-outline-comita" data-carritoid="{{ $carrito->id }}" data-toggle="modal" data-target="#pagarDeuda">
										                Pagar
										            </button>
										        @endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="cotizaciones" role="tabpanel" aria-labelledby="cotizaciones-tab">
							<div class="p-2 text-center">
								<strong>Ventas de las cotizaciones</strong>
							</div>
							<div class="table-responsive bg-light" >
								<table class="table" id="tabla-tallas">
									<thead style="background-color:#0a2b4e; color: cyan; ">
										<tr class="text-center">
											<th scope="col">#</th>
											<th scope="col">Nombre/Código</th>
											<th scope="col">Estado</th>
											<th scope="col">Anticipo</th>
											<th scope="col">Total</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cotizaciones as $key => $cotizacion)
										<tr>
											<td class="" style="text-align: center">{{ ++$key }}</td>
											<td class="col-sm-5 col-md-5">
												<div class="media">
						                            <a class="thumbnail pull-left pr-2" href=" " target="_blanck">
						                            	<img class="media-object" src="{{ asset($cotizacion->fotoimagen) }}" style="width: 70px; height: 70px; border:2px solid cyan;">
						                            </a>
						                            <div class="media-body">
						                                <div class="title_prodetalle">
						                                	<h1 style="font-size: 1em;" class="pb-0 mb-0">
						                                		{{ $cotizacion->user->fullname }}
						                                    </h1>
						                                </div>
						                                <div class="product-talla pt-0 mt-0">
									                    	<strong>Entrega:</strong>
									                        <label class="checkbox-btn pt-0 mt-0 pb-0 mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $cotizacion->fecha->format('d M') }} </span>
									                        </label>
									                    </div>
									                    <div class="product-talla">
				                                            <strong>Cantidad:</strong>
															<label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $cotizacion->cantidad }} </span>
									                        </label>
							                        	</div>
						                            </div>
						                        </div>
											</td>
											<td class="col-sm-2 col-md-2 text-center">
												<label class="checkbox-btn mb-0" >
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan; font-size: 15px;"> {{ $cotizacion->estado }} </span>
                                                </label>
                                                <div class="product-talla mt-0">
							                    	<strong>Codigo:</strong>
							                    	<small class="text-justify text-sm-left text-muted">
		                                                {{ $cotizacion->codigo }}
		                                            </small>
		                                        </div>
											</td>
											<td class="col-sm-1 col-md-1 text-center">
												@if($cotizacion->anticipo)
													<strong>Bs. {{ $cotizacion->anticipo }}</strong>
												@else
													<strong style="color:red;">Ninguno</strong>
												@endif
											</td>
											<td class="col-sm-2 col-md-2 text-center">
												<strong>Bs. {{ $cotizacion->precio }}</strong>
												@if($cotizacion->anticipo < $cotizacion->precio)
												<button type="button" class="btn btn-sm btn-outline-secondary" data-cotizacionid="{{ $cotizacion->id }}" data-toggle="modal" data-target="#pagarDecoti">
									                Deuda: {{ $cotizacion->precio - $cotizacion->anticipo }} Bs.
									            </button>
									            @endif
											</td>
											<td class="col-sm-1 col-md-1 text-white " >
											  	<a href="{{ route('admin.pedidos.detallecoti',[$cotizacion->slug]) }}" class="btn btn-sm btn-block btn-comita " target="_blanck">
				                                    <span class="text-white">Ver Cotización</span>
				                                </a>
				                                @if($cotizacion->anticipo < $cotizacion->precio)
					                                <button type="button" class="btn btn-sm btn-outline-comita btn-block" data-cotizacionid="{{ $cotizacion->id }}" data-toggle="modal" data-target="#pagarDecoti">
									                Pagar
									            	</button>
										        @endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
    height: 200px !important;
}

.widget-user .widget-user-image {
    /*position: absolute;*/
    top: 100px !important;
    /*left: 50%;
    margin-left: -45px;*/
}
.nav-link.active{
	background-color: #0a2b4e !important;
	color: cyan !important;
	border: 2px solid cyan !important;
}
.nav-tabs {
    border-bottom: 1px solid cyan;
}
.btn-light-checkbox {
	font-size: 12px;
	padding: 0.0rem 0.3rem;
}

</style>
@endpush


@push('scripts')
<script>
$('#pagarDeuda').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget)
	  var ca_id = button.data('carritoid')
	  var modal = $(this)
	  modal.find('.modal-body #carrito_id').val(ca_id);
})
$('#pagarDecoti').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget)
	  var co_id = button.data('cotizacionid')
	  var modal = $(this)
	  modal.find('.modal-body #cotizacion_id').val(co_id);
})
</script>
@endpush
