@extends('layouts.master')
@section('titulo','Crear-Cotización')
@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><strong>Cotización: {{ $cotizacion->codigo }}</strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.cotizaciones.index') }}">Cotizaciones</a></li>
            <li class="breadcrumb-item active">Crear</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('contenido')
<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="text-center col-md-10">
          @if($fotos->count())
        <div class="row row-cols-1 row-cols-md-3 p-2">
          @foreach($fotos as $foto)
            <div class="btn-comita text-center p-2">
              <form method="POST" action="{{ route('cotizacion.foto.delete', $foto->id) }}" class="">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-xs" style="position:absolute" type="submit"><i class="fas fa-times-circle"></i></button>
                  <img src="{{ url($foto->imagen) }}" class="img-tam-edit" alt="...">
              </form>
            </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
    <form method="POST" action="{{ route('admin.cotizaciones.update',[$cotizacion->slug]) }}" class="was-validated">
      @csrf @method('PUT')
          <div class="card card-info">
            <div class="btn-comita">nueva cotización</div>
            <div class="card-body">
              <div class="row bg-light">
                  <div class="col-md-7">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Nombre:') }}</strong></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : 'border-1' }}" id="nombre" name="nombre" placeholder="Nombre de la nueva cotización" value="{{ old('nombre',$cotizacion->nombre) }}" required>
                                  @if ($errors->has('nombre'))
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('nombre') }}</strong>
                                  </span>
                              @endif
                        </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                      <div class="form-group row">
                          <label for="cantidad" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Cantidad:') }}</strong></label>
                          <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" name="cantidad"  class="form-control {{ $errors->has('cantidad') ? ' is-invalid' : 'border-1' }}" value="{{ old('cantidad', $cotizacion->cantidad) }}" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">>6</span>
                                </div>
                                @if ($errors->has('cantidad'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('cantidad') }}</strong>
                                  </span>
                              @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row pt-4">
                  <div class="col-md-7">
                    <div class="form-group row">
                      <label for="materiales" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Materiales:') }}</strong></label>
                      <div class="col-sm-8">
                          <select class="form-control select2 {{ $errors->has('materiales') ? ' is-invalid' : 'border-1' }}" name="materiales[]" multiple="multiple" data-placeholder="Seleccione los materiales" >
                            @foreach($materiales as $material)
                              <option {{ collect(old('materiales', $cotizacion->materiales->pluck('id')))->contains($material->id) ? 'selected' : '' }} value="{{ $material->id }}">{{ $material->nombre }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('materiales'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('materiales') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                      <div class="form-group row">
                        <label for="tallas" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Tallas:') }}</strong></label>
                        <div class="col-sm-8">
                            <select class="form-control select2 {{ $errors->has('tallas') ? ' is-invalid' : 'border-1' }}" name="tallas[]" multiple="multiple" data-placeholder="Seleccione las tallas" >
                              @foreach($tallas as $talla)
                                <option {{ collect(old('tallas', $cotizacion->tallas->pluck('id')))->contains($talla->id) ? 'selected' : '' }} value="{{ $talla->id }}">{{ $talla->nombre }}</option>
                              @endforeach
                              </select>
                              @if ($errors->has('tallas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tallas') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row pt-4 bg-light justify-content-center">
                  <div class="col-md-7">
                      <div class="form-group row">
                          <label for="fotos" class="col-sm-2 col-form-label text-md-right"><strong></strong>{{ __('Fotos:') }}</strong></label>
                          <div class="col-sm-10">
                              <div class="dropzone "></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                      <div class="form-group row">
                          <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Descripción:') }}</strong></label>
                          <div class="col-sm-8">
                              <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="6" name="descripcion" id="descripcion"  placeholder="Ingrese la descripción de la cotización" >{{ old('descripcion',$cotizacion->descripcion) }}</textarea>
                                  @if ($errors->has('descripcion'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('descripcion') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="row  justify-content-center">
            <button class="btn btn-comita text-white" type="submit" >
              GUARDAR COTIZACIÓN
            </button>
          </div>
      </form>
  </div>
</section>
@endsection
@push('scripts')
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript">
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: "classic",
    })
 })
 var myDropzone = new Dropzone('.dropzone', {
    url: '/admin/cotizaciones/{{ $cotizacion->id }}/fotos',
    paramName: 'foto',
    acceptedFiles: 'image/*',
    maxFilesize: 1,
    maxFiles: 3,
    headers: {
      'x-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    dictDefaultMessage: 'Arrastra las fotos aquí para enviarlas',
    dictMaxFilesExceeded: 'Solo se permiten subir 3 imágenes.'
  });
  myDropzone.on('error', function(file, res){
    var msj = res.errors.foto[0];
    $('.dz-error-message:last > span').text(msj);
  });
  Dropzone.autoDiscover = false;
</script>
@endpush