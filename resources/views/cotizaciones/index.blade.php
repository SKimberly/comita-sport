@extends('layouts.master')
@section('titulo','Listar Cotizaciones')
@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Lista de Cotizaciones</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Cotizaciones</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('contenido')
@include('cotizaciones.create')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header ">
              <button type="button" class="btn btn-xl btn-comita text-white pull-rigth" data-toggle="modal" data-target="#crearCo">
                  <i class="fas fa-plus-circle"></i> Nueva Cotización
              </button>
              <p class="text-center">MIS COTIZACIONES</p>
          </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tabla-productos">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Cotización</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Tallas</th>
                          <th scope="col">Materiales</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($cotizaciones as $key => $cotizacion)
                            <tr>
                                <td class="text-center col-sm-1 col-md-1" >{{ ++$key }}</td>
                                <td class="col-sm-4 col-md-4">
                                    <div class="media">
                                        <a class="thumbnail pull-left pr-2" href="#">
                                          <img class="media-object" src="{{ asset($cotizacion->fotoimagen) }}" style="width: 80px; height: 80px; border:2px solid cyan;">
                                        </a>
                                        <div class="media-body ">
                                            <div class="title_prodetalle">
                                              <h1 style="font-size: 1.5em;" class="mb-0">
                                                {{ $cotizacion->nombre }}
                                              </h1>
                                            </div>
                                            <div class="product-talla">
                                                <strong>Código:</strong>
                                                <label class="checkbox-btn mb-0">
                                                    <span class="btn btn-light-checkbox" style="background-color: cyan;"> {{ $cotizacion->codigo }} </span>
                                                </label> <br/>
                                                <small class="text-justify text-sm-left text-muted">
                                                  {{ $cotizacion->descripcion }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center col-sm-1 col-md-1">{{ $cotizacion->cantidad }}</td>
                                <td class="col-sm-2 col-md-2">
                                    @foreach($cotizacion->tallas as $talla)
                                        <label class="checkbox-btn mb-0">
                                            <span class="btn btn-light-checkbox bg-light" > {{ $talla->nombre }} </span>
                                        </label>
                                    @endforeach
                                </td>
                                <td class="col-sm-2 col-md-2">
                                    @foreach($cotizacion->materiales as $material)
                                        <label class="checkbox-btn mb-0">
                                            <span class="btn btn-light-checkbox bg-light" > {{ $material->nombre }} </span>
                                        </label>
                                    @endforeach
                                </td>
                                <td class="text-center col-sm-1 col-md-1">
                                    {{ $cotizacion->precio }}
                                    @if($cotizacion->descuento)
                                    <div class="product-talla">
                                        <strong>Descuento:</strong>
                                        <label class="checkbox-btn mb-0">
                                            <span class="btn btn-light-checkbox text-white" style="background-color: #0a2b4e;"> {{ $cotizacion->descuento }}. </span>
                                        </label>
                                    </div>
                                    @endif
                                </td>
                                {{--<td class="text-center">
                                    <picture style="position: relative;">
                                        <div class="car_home_precio">
                                          @if($cotizacion->estado ===  "ACTIVO")
                                            <span style="color:green;"> ACTIVO </span>
                                          @endif
                                          @if($cotizacion->estado ===  "PENDIENTE")
                                            <span style="color:yellow;"> PENDIENTE </span>
                                          @endif
                                          @if($cotizacion->estado ==  'PROCESANDO')
                                            <span style="color:blue;"> PROCESANDO </span>
                                          @endif
                                          @if($cotizacion->estado ==  'FINALIZADO')
                                            <span style="color:cyan;"> FINALIZADO </span>
                                          @endif
                                          @if($cotizacion->estado ==  'RECHAZADO')
                                            <span style="color:red;"> RECHAZADO </span>
                                          @endif
                                        </div>
                                    </picture>
                                </td>
                                <td>{{ $producto->created_at->format('d M h:m') }}</td>--}}
                                <td class="text-center col-sm-1 col-md-1">
                                    <a href="" class="btn btn-sm btn-block btn-comita text-white">
                                          Editar
                                    </a>
                                    <a href="" class="btn btn-sm btn-block btn-outline-comita ">
                                          Ver Detalles
                                    </a>
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
<style>
.car_home_precio {
  padding: 0px !important;
  font-size: 10px !important;
  top: 0px !important;
  border: 0px !important;
  font-weight: bolder !important;
}
.btn-light-checkbox {
  font-size: 10px;
}
</style>
@endpush
@push('scripts')
<script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
          title: '¿Estás seguro?',
          text: "¿Deseas dar de baja este producto?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0a2b4e',
          cancelButtonColor: '#d33',
          showCancelButton: true,
          confirmButtonText: 'Si, dar de baja!',
          cancelButtonText: 'No, todavía'
        }).then((e) => {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('/admin/producto') }}/"+id+"/baja",
                    data: {_token: CSRF_TOKEN },
                    dataType: 'JSON',
                    success: function (results) {
                        setTimeout(function() {
                             location.reload();
                        },0);
                        swal.fire("Excelente!", results.success, "success");
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
@endpush