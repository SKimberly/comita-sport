@extends('layouts.master')

@section('titulo','Listar Productos')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Lista de Productos</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('contenido')
@include('admin.productos.create')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header ">
              <button type="button" class="btn btn-xl btn-comita text-white pull-rigth" data-toggle="modal" data-target="#crearPro">
                  <i class="fas fa-plus-circle"></i> Nuevo producto
              </button>
              <p class="text-center">NUESTROS PRODUCTOS</p>
          </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tabla-productos">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Stock</th>
                          <th scope="col">Descuento</th>
                          <th scope="col">Oferta</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($productos as $key => $producto)
                            <tr>
                                <th class="text-center" >{{ ++$key }}</th>
                                <td>{{ $producto->nombre }}</td>
                                <td class="text-center">{{ $producto->precio }}</td>
                                <td class="text-center">{{ $producto->stock }}</td>
                                <td class="text-center">Por cada {{ $producto->cant_descuento }} unidades tienes un descuento del {{ $producto->descuento }} %.</td>
                                <td class="text-center">{{ $producto->oferta }}</td>
                                {{--<td>{{ $producto->categoria->nombre }}</td>--}}
                                <td class="text-center">
                                    <img src="{{ asset($producto->detalleimagenurl) }}" class="img-tam" alt="Producto Foto">
                                </td>
                                {{--<td>{{ $producto->created_at->format('d M h:m') }}</td>--}}
                                <td class="text-center">
                                    <a href="{{ route('admin.productos.edit', [$producto->slug]) }}" class="btn btn-sm btn-block btn-comita text-white">
                                          Editar
                                    </a>

                                     <button class="btn btn-sm  btn-outline-comita btn-block" onclick="deleteConfirmation('{{$producto->id}}')">Dar Baja</button>
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


