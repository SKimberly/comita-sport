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
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header text-center">
              NUESTROS PRODUCTOS
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
                                <td class="text-center">Por cada {{ $producto->cant_descuento }} unidades, tienes un descuento de {{ $producto->descuento }} % </td>
                                <td class="text-center">{{ $producto->des_oferta }}</td>
                                {{--  <td><img src="{{ $producto->fotos->first()->imagen   }}" alt="" ></td> --}}
                                <td class="text-center"> <img src="{{ $producto->FavoritoImagenUrl }}" alt="" class="img-tam"></td>
                                <td class="text-center">

                                  <form method="post" action="">
                                      @method('DELETE') @csrf

                                      <a href="" class="btn btn-sm btn-block colorcard">
                                        <i class="fa fa-eye"></i> Ver Fotos
                                      </a>

                                        <a href="" class="btn btn-sm btn-block colorprin">
                                          Editar
                                        </a>
                                        <button class="btn btn-sm btn-block btn-danger" type="submit">
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
<link href="{{ asset('datatable/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('datatable/jquery.dataTables.js') }}" ></script>
<script src="{{ asset('datatable/dataTables.bootstrap4.js') }}" ></script>


<script>
    $(function () {
      $('#tabla-productos').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
      });
    });
</script>
@endpush


