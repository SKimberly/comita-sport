@extends('layouts.master')

@section('titulo','Listar Pedidos')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Lista de pedidos</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li> <li class="breadcrumb-item active">Listar pedidos</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('contenido')
<section class="content">
	<div class="container-fluid">
		<div class="col-12 col-sm-10 col-lg-10 mx-auto">
			<div class="card card-widget widget-user">
              	<div class="widget-user-header text-white"
                   	style="background: url('/img/welcome/potosi2.jpg') center center;">
                	<h3 class="widget-user-username text-right">Nombre</h3>
                	<h5 class="widget-user-desc text-right">Administrador</h5>
              	</div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{ asset('img/sidebar/userdefault.svg') }}" alt="User Avatar">
              </div>
                <div class="card-body btn-comita text-white pt-0" >
              		<div class="text-center p-2">
              			<strong>LISTA DE PEDIDOS</strong>
              		</div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item col-md-6 text-center" role="presentation">
					     <a class="nav-link active text-white" id="carritos-tab" data-toggle="tab" href="#carritos" role="tab" aria-controls="carritos" aria-selected="true">CARRITO DE COMPRAS</a>
					  </li>
					  <li class="nav-item col-md-6 text-center" role="presentation">
					    <a class="nav-link text-white" id="cotizaciones-tab" data-toggle="tab" href="#cotizaciones" role="tab" aria-controls="cotizaciones" aria-selected="false">COTIZACIONES DE PRODUCTOS</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="carritos" role="tabpanel" aria-labelledby="carritos-tab">
							<div class="p-2 text-center">
								<strong>Lista del carrito de compras</strong>
							</div>
							<div class="table-responsive bg-light" >
								<table class="table" id="tabla-tallas">
									<thead style="background-color:#0a2b4e; color: cyan; ">
										<tr class="text-center">
											<th scope="col">#</th>
											<th scope="col">Nombre/Código</th>
											<th scope="col">Cantidad</th>
											<th scope="col">Estado</th>
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
						                            	<img class="media-object" src="{{ $carrito->carrito_detalles->first()->producto->detalleimagenurl }}" style="width: 70px; height: 70px; border:2px solid cyan;">
						                            </a>
						                            <div class="media-body ">
						                                <div class="title_prodetalle">
						                                	<h1 style="font-size: 1em;" class="mb-0  ">
						                                		{{ $carrito->user->fullname }}
						                                	</h1>
						                                </div>
						                                <div class="product-talla">
									                    <strong>Fecha:</strong>
									                        <label class="checkbox-btn mb-0">
									                            <span class="btn btn-light-checkbox" > {{ $carrito->fecha_orden->format('M d') }} </span>
									                        </label>
									                    </div>
														<small class="text-justify text-sm-left text-muted">
		                                                  {{ $carrito->codigo }}
		                                                </small>
						                            </div>
						                        </div>
											</td>
											<!--<td class="col-sm-1 col-md-1">
					                        	<strong>{{ $carrito->fecha_orden->format('M d') }} - {{ $carrito->fecha_orden->diffForHumans() }}</strong>
					                        </td>-->
					                        <td class="col-sm-2 col-md-2">
					                        	<a href="{{ route('admin.pedidos.show', [$carrito->id]) }}" class="btn btn-outline-secondary btn-sm" target="_blanck">
					                        	Productos: <strong>{{ $carrito->carrito_detalles->count() }}</strong>
					                        	</a>
					                        </td>
											<td class="col-sm-1 col-md-1 text-center">
												<label class="checkbox-btn mb-0" >
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan; font-size: 15px;"> {{ $carrito->estado }} </span>
                                                </label>
											</td>
											<td class="col-sm-2 col-md-2 text-center">
												<strong>Bs. {{ $carrito->total_bs }}</strong>
											</td>
											<td class="col-sm-1 col-md-1 text-white " >
											  	<a href="{{ route('admin.pedidos.show', [$carrito->id]) }}" class="btn btn-sm btn-block btn-comita" target="_blanck">
				                                    <span class="text-white">Ver Pedido</span>
				                                </a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="cotizaciones" role="tabpanel" aria-labelledby="cotizaciones-tab">
										coti
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
</style>
@endpush



