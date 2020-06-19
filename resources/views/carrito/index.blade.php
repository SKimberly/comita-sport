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
		<div class="card">
			<div class="card-header text-center btn-comita text-white" >
				<strong>CARRITO DE COMPRAS</strong>
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
									<td class="col-sm-1 col-md-1" style="text-align: center">{{ ++$key }}</td>
									<td class="col-sm-5 col-md-5">
										<div class="media">
				                            <a class="thumbnail pull-left pr-2" href="#">
				                            	<img class="media-object" src="{{ asset($detalle->producto->detalleimagenurl) }}" style="width: 80px; height: 80px; border:2px solid cyan;">
				                            </a>
				                            <div class="media-body ">
				                                <div class="title_prodetalle">
				                                	<h1 style="font-size: 1.5em;" class="mb-0">
				                                		{{ $detalle->producto->nombre }}
				                                	</h1>
				                                </div>
				                                <div class="product-talla">
							                        <strong>Tallas:</strong>
							                        @foreach($detalle->tallas as $talla)
							                            <label class="checkbox-btn mb-0">
							                                <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $talla->nombre }} </span>
							                            </label>
							                        @endforeach
							                    </div>
												<div class="product-talla">
													<span class="text-left">
														<strong>Precio c/u:</strong>
							                                <span class="pr-3"> {{ $detalle->producto->precio }} Bs. </span>
													</span>
													<button type="button" class="btn btn-sm   btn-outline-danger " data-toggle="tooltip" data-placement="right" title="Eliminar producto." onclick="borrarConfirmation('{{$detalle->id}}')">
														<i class="far fa-trash-alt"></i>
							                        </button>
												</div>
				                            </div>
				                        </div>
									</td>
									<td class="col-sm-1 col-md-1" style="text-align: center">
			                        	<strong>  {{ $detalle->cantidad }}</strong>
			                        </td>
									<td class="col-sm-2 col-md-2 text-center">
										<strong>Bs. {{ $detalle->producto_precio }}</strong>
									</td>
									<td class="col-sm-1 col-md-1 text-center">
										<strong>Bs. {{ $detalle->descuento_pro }}</strong>
									</td>
									<td class="col-sm-2 col-md-2 text-right btn-comita" style="background-color: #d9edf7;">
										<strong>Bs. {{ $detalle->subtotal_bs	 }}</strong>
									</td>
								</tr>
									@php
										if($detalle){
											$total = $detalle->montototal;
										}
									@endphp
								@endforeach
							</tbody>
							<tfoot>
			                    <tr>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td class="btn-comita" style="background-color: #d9edf7;border: 1px solid #0a2b4e;">
			                        	<h5><strong>Total:</strong></h5>
			                        </td>
			                        <td class="text-right" style="background-color: #d9edf7;border: 1px solid #0a2b4e;">
			                        	<h4><strong> {{ $total }} Bs:</strong></h4>
			                        </td>
			                    </tr>

			                    <tr>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>   </td>
			                        <td>
				                        <form method="post" action="{{ route('admin.carrito.update') }}">
											@csrf
											<button type="submit" class="btn btn-block btn-comita text-white">
				                            ENVIAR  <i class="fas fa-cart-plus"></i>
				                        	</button>
										</form>
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


@push('scripts')
<script type="text/javascript">
    function borrarConfirmation(id)
    {
        swal.fire({
          title: '¿Estás seguro?',
          text: "¿Deseas quitar este producto?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0a2b4e',
          cancelButtonColor: '#d33',
          showCancelButton: true,
          confirmButtonText: 'Si, eliminar!',
          cancelButtonText: 'No, todavía'
        }).then((e) =>
        {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('/admin/producto/detalle') }}/"+id+"/eliminar",
                    data: {_token: CSRF_TOKEN },
                    dataType: 'JSON',
                    success: function (results) {
                        setTimeout(function() {
                             location.reload();
                        },0);
                        swal.fire("Excelente!", results.respuesta, "success" );
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
<!--<script>
	<input type="text" value="0" id="descuentototal" onkeyup="sumar()">
	function sumar()
    {
    	var datos =  ;
		var destotal = verificar("descuentototal");
	    document.getElementById("totalcarrito").value=(parseFloat(datos)+parseFloat(destotal)).toFixed(2);
	}

	function verificar(id)
    {
        var obj=document.getElementById(id);
        if(obj.value=="")
            value="0";
        else
            value=obj.value;
        if(validate_importe(value,1))
        {
            obj.style.borderColor="#808080";
            return value;
        }else{
            obj.style.borderColor="#f00";
            return 0;
        }
    }
    function validate_importe(value,decimal)
    {
            if(decimal==undefined)
                decimal=0;
            if(decimal==1)
            {
               var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
            }else{
                var patron=new RegExp("^([0-9])*$")
            }
            if(value && value.search(patron)==0)
            {
                return true;
            }
            return false;
    }
</script>-->
@endpush
