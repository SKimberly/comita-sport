@extends('layouts.master')

@section('titulo','Reportes')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>Reportes</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Generar reportes</li>
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
	                <img style="border:none;" src="{{ asset('img/sidebar/reportes.svg') }}" alt="reportes">
	            </div>
                <div class="card-body pt-0" >
              		<div class="text-center p-2">
              			<a class="nav-link active text-white"> <strong> GENERAR REPORTES </strong></a>
              		</div>
        					<div class="row justify-content-center">
                      <div class="col-md-6">
                        <div class="card">
                            <div class="card-header btn-comita text-white text-center">
                              <strong>REPORTE POR TIPO DE PRENDA </strong>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('reporte.tipo.view') }}">
                              @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label text-md-right">Tipo: </label>
                                  <div class="col-sm-8">
                                      <select class="form-control select2 {{ $errors->has('categoria') ? ' is-invalid' : 'border-1' }}" name="categoria">
                                        <option value="">Seleccione una opcion</option>
                                        @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                   {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                                                 >{{ $categoria->nombre }}</option>
                                            @endforeach
                                      </select>
                                      @if ($errors->has('categoria'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('categoria') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-4 col-form-label text-md-right">Desde:</label>
                                  <div class="col-sm-8">
                                    <input type="date" class="form-control" name="inicio">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-4 col-form-label text-md-right">Hasta:</label>
                                  <div class="col-sm-8">
                                    <input type="date" class="form-control" name="final">
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer pt-2 text-center">
                                  <button type="submit" class="btn btn-comita text-white">
                                    ENVIAR
                                  </button>
                              </div>
                              <!-- /.card-footer -->
                            </form>
                          </div>
                      </div>
                      <div class="col-md-6">

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
<script type="text/javascript">
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: "classic",
    })
  })
</script>

@endpush
