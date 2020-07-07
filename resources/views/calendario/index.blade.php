@extends('layouts.master')

@section('titulo','Calendario')

@section('cabecera')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark"><strong>CALENDARIO</strong></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
					<li class="breadcrumb-item active">Listar de pedidos aprobados</li>
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
	                <img style="border:none;" src="{{ asset('img/sidebar/calendario.svg') }}" alt="User Avatar">
	            </div>
                <div class="card-body pt-0" >
              		<div class="text-center p-2">
              			<a class="nav-link active text-white"> <strong> CALENDARIO DE ENTREGA DE PEDIDOS </strong></a>
              		</div>
					<div class="pb-4">
				       <div id='calendar'></div>
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

#calendar {
	max-width: 1100px;
	margin: 0 auto;
}

.fc-daygrid-event {
	border: 1px solid var(--fc-event-bg-color, cyan) !important;
	background-color: var(--fc-event-border-color, #0a2b4e) !important;
	color: white !important;
}

</style>
<link rel="stylesheet" href="{{ asset('calendario/main.css') }}">
@endpush


@push('scripts')
<script src="{{ asset('calendario/main.js') }}" ></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      timeZone: 'America/La_Paz',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      buttonText: {
        today: 'HOY',
        month: 'MES',
        week : 'SEMANA',
        day  : 'DÍA',
        list : 'LISTA'
      },
      initialDate: '2020-06-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: false,
      selectable: true,
      events: [

        @foreach($carritos as $carrito)
          {
              title : '{{ $carrito->user->fullname  }} - Estado: {{ $carrito->estado }} - Precio: {{ $carrito->total_bs }} Bs.',
              start : '{{ $carrito->fecha_entrega }}',
              color : '#0bd2ff',
              url   : '{{ route('admin.pedidos.show', [$carrito->id]) }}',
          },
         @endforeach

         @foreach($cotizaciones as $cotizacion)
          {
              title : '{{ $cotizacion->user->fullname }} - Estado: {{ $cotizacion->estado }} - Precio: {{ $cotizacion->precio }} Bs.',
              start : '{{ $cotizacion->fecha }}',
          	  color : '#0bd2ff',
          	  url   : '{{ route('admin.pedidos.detallecoti',[$cotizacion->slug]) }}',
          },
         @endforeach

      ]
    });
    calendar.render();
  });

</script>
@endpush
