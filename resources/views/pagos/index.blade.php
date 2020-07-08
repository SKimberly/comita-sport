@extends('layouts.master')

@section('titulo','Listar Pagos')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>PAGOS</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Listar pagos</li>
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
                   	style="background: url('/img/welcome/potosi3.jpg') center center;">
                	<h3 class="widget-user-username text-right">Nombre</h3>
                	<h5 class="widget-user-desc text-right">Administrador</h5>
              	</div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="User Avatar">
              </div>
                <div class="card-body  pt-0" >
              		<div class="text-center p-2">
              			<strong>LISTA DE PAGOS</strong>
              		</div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item col-md-6 text-center bg-light" role="presentation">
					     <a class="nav-link active text-white" id="carritos-tab" data-toggle="tab" href="#carritos" role="tab" aria-controls="carritos" aria-selected="true">PAGOS DE CARRITO DE COMPRAS</a>
					  </li>
					  <li class="nav-item col-md-6 text-center bg-light" role="presentation">
					    <a class="nav-link text-white" id="cotizaciones-tab" data-toggle="tab" href="#cotizaciones" role="tab" aria-controls="cotizaciones" aria-selected="false">PAGOS DE COTIZACIONES</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="carritos" role="tabpanel" aria-labelledby="carritos-tab">
							<div class="p-2 text-center">
								<strong>Pagos del carrito de compras</strong>
							</div>
							<div class="table-responsive " >
								<table class="table" id="tabla-tallas">
									<thead style="background-color:#0a2b4e; color: cyan; ">
										<tr class="text-center">
											<th scope="col">#</th>
											<th scope="col">Nombre</th>
											<th scope="col">Monto</th>
											<th scope="col">Descripción</th>
											<th scope="col">Respuesta</th>
											<th scope="col">Estado</th>
										</tr>
									</thead>
									<tbody>
										@foreach($carripagos as $key => $capago)
										<tr>
											<td class="" style="text-align: center">{{ $capago->id }}</td>
											<td class="col-sm-5 col-md-5">
												<div class="media">
						                            <a class="thumbnail pull-left pr-2" href=" " target="_blanck">
						                            	<img class="media-object" src="{{ url($capago->imagen ) }}" style="width: 70px; height: 70px; border:2px solid cyan;">
						                            </a>
						                            <div class="media-body ">
						                                <div class="title_prodetalle">
						                                	<h1 style="font-size: 1em;" class="mb-0  ">
						                                		{{ $capago->user->fullname }}
						                                	</h1>
						                                </div>
						                                <div class="product-talla">
									                    <strong>Fecha:</strong>
									                        <label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $capago->fecha->format('M d') }} </span>
									                        </label>
									                    </div>
														<div class="product-talla">
									                    <strong>Código:</strong>
									                        <label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $capago->carrito->codigo }} </span>
									                        </label>
									                    </div>
						                            </div>
						                        </div>
											</td>
					                        <td class="col-sm-1 col-md-1">
					                        	<label class="checkbox-btn" >
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan; font-size: 15px;"> Bs. {{ $capago->monto }} </span>
                                                </label>
					                        </td>
											<td class="col-sm-2 col-md-2 text-justify">
												<p>{{ $capago->descripcion }}</p>
											</td>
											<td class="col-sm-2 col-md-2 text-center text-justify">
												<p>{{ $capago->respuesta }}</p>
											</td>
											<td class="col-sm-1 col-md-1 " >
												@if($capago->estado === 'Pendiente')
													@if(auth()->user()->tipo === 'Administrador')
														<a href="{{ route('pago.verify.carrito',$capago->carrito->id) }}" class="btn btn-sm btn-block btn-success" target="_blanck">Validar Pago</a>
													@else
														<span  class="btn btn-sm btn-block btn-warning" >
																<strong>Validando Pago</strong>
															</span>
													@endif
												@elseif($capago->estado === 'Aceptado')
													<span class="btn btn-sm btn-block btn-success" data-respu=" " data-toggle="modal" data-target="#resPago">
														<strong >Pago Aceptado</strong>
													</span>
												@else
													<span class="btn btn-sm btn-block btn-danger" data-respu=" " data-toggle="modal" data-target="#resPago">
														<strong >Pago Rechazado</strong>
													</span>
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
								<strong>Pagos de las cotizaciones</strong>
							</div>
							<div class="table-responsive  " >
								<table class="table" id="tabla-tallas">
									<thead style="background-color:#0a2b4e; color: cyan; ">
										<tr class="text-center">
											<th scope="col">#</th>
											<th scope="col">Nombre</th>
											<th scope="col">Monto</th>
											<th scope="col">Descripción</th>
											<th scope="col">Respuesta</th>
											<th scope="col">Estado</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cotipagos as $key => $copago)
										<tr>
											<td class="" style="text-align: center">{{ ++$key }}</td>
											<td class="col-sm-5 col-md-5">
												<div class="media">
						                            <a class="thumbnail pull-left pr-2" href=" " target="_blanck">
						                            	<img class="media-object" src="{{ url($copago->imagen ) }}" style="width: 70px; height: 70px; border:2px solid cyan;">
						                            </a>
						                            <div class="media-body">
						                                <div class="title_prodetalle">
						                                	<h1 style="font-size: 1em;" class="pb-0 mb-0">
						                                		{{ $copago->user->fullname }}
						                                    </h1>
						                                </div>
						                                <div class="product-talla pt-0 mt-0">
									                    	<strong>Entrega:</strong>
									                        <label class="checkbox-btn pt-0 mt-0 pb-0 mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $copago->fecha->format('d M') }} </span>
									                        </label>
									                    </div>
									                    <div class="product-talla pt-0 mt-0">
									                    	<strong>Código:</strong>
									                        <label class="checkbox-btn pt-0 mt-0 pb-0 mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $copago->cotizacion->codigo }} </span>
									                        </label>
									                    </div>
						                            </div>
						                        </div>
											</td>
											<td class="col-sm-1 col-md-1 text-center">
												<label class="checkbox-btn" >
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan; font-size: 15px;"> Bs. {{ $copago->monto }} </span>
                                                </label>
											</td>
											<td class="col-sm-2 col-md-2 text-justify">
												<p>{{ $copago->descripcion }}</p>
											</td>
											<td class="col-sm-2 col-md-2 text-justify">
												<p>{{ $copago->respuesta }}</p>
											</td>
											<td class="col-sm-1 col-md-1 text-white " >
											  	 @if($copago->estado === 'Pendiente')
													@if(auth()->user()->tipo === 'Administrador')
														<a href="{{ route('pago.verify.cotizacion',$copago->cotizacion->id) }}" class="btn btn-sm btn-block btn-success" target="_blanck">Validar Pago</a>
													@else
														<span  class="btn btn-sm btn-block btn-warning" >
															<strong>Validando Pago</strong>
														</span>
													@endif
												@elseif($copago->estado === 'Aceptado')
													<span class="btn btn-sm btn-block btn-success" data-respu=" " data-toggle="modal" data-target="#resPago">
														<strong >Pago Aceptado</strong>
													</span>
												@else
													<span class="btn btn-sm btn-block btn-danger" data-respu=" " data-toggle="modal" data-target="#resPago">
														<strong >Pago Rechazado</strong>
													</span>
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
$('#crearFecha').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget)
	  var ca_id = button.data('carritoid')
	  var modal = $(this)
	  modal.find('.modal-body #carrito_id').val(ca_id);
})
</script>

<script>
$('#pedidoPago').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget)
	  var pe_id = button.data('pedidoid')
	  var pe_tipo = button.data('tipo')
	  var pe_codigo = button.data('codigo')
	  var modal = $(this)
	  modal.find('.modal-body #pedido_id').val(pe_id);
	  modal.find('.modal-body #pedido_tipo').val(pe_tipo);
	  modal.find('.modal-body #pedido_codigo').val(pe_codigo);
})
</script>
<script>
$custom-file-text: (
  es: "Elegir"
);
</script>

<script>
$('#resPago').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget)
	  var respuesta = button.data('respu')
	  var modal = $(this)
	  modal.find('.modal-body #respuesta_id').val(respuesta);
})
</script>
@endpush

