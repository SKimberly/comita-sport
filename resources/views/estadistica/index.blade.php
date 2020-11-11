@extends('layouts.master')

@section('titulo','Gráficas')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Estadisticas</strong></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <a href="{{ route('admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Ver gráficas de las ventas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<?php

use App\Models\Carrito;
use App\Models\Cotizacion;

function getUltimoDiaMes($elAnio,$elMes) {
  return date("d", mktime(0,0,0, $elMes+1, 0, $elAnio));
}
// Aqui obtenemos el año
$año = intval(date("Y"));
$diac = date("Y-m-d");

// Obtener el año actual para cualquier mes primer dia del mes
$dia1 = $año."-01-01";
$dia2 = $año."-02-01";
$dia3 = $año."-03-01";
$dia4 = $año."-04-01";
$dia5 = $año."-05-01";
$dia6 = $año."-06-01";
$dia7 = $año."-07-01";
$dia8 = $año."-08-01";
$dia9 = $año."-09-01";
$dia10 = $año."-10-01";
$dia11 = $año."-11-01";
$dia12 = $año."-12-01"; // ---> 2020-01-01

//Año pasado
$añopa = intval(date('Y', strtotime('-1 year')));
$dia1pa = $añopa."-01-01";
$dia2pa = $añopa."-02-01";
$dia3pa = $añopa."-03-01";
$dia4pa = $añopa."-04-01";
$dia5pa = $añopa."-05-01";
$dia6pa = $añopa."-06-01";
$dia7pa = $añopa."-07-01";
$dia8pa = $añopa."-08-01";
$dia9pa = $añopa."-09-01";
$dia10pa = $añopa."-10-01";
$dia11pa = $añopa."-11-01";
$dia12pa = $añopa."-12-01";

$ultimoDiapa = getUltimoDiaMes($añopa,1);
$fecha1pa = $añopa."-01-".$ultimoDiapa; //2020-01-31
$ultimoDiapa = getUltimoDiaMes($añopa,2);
$fecha2pa = $añopa."-02-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,3);
$fecha3pa = $añopa."-03-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,4);
$fecha4pa = $añopa."-04-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,5);
$fecha5pa = $añopa."-05-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,6);
$fecha6pa = $añopa."-06-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,7);
$fecha7pa = $añopa."-07-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,8);
$fecha8pa = $añopa."-08-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,9);
$fecha9pa = $añopa."-09-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,10);
$fecha10pa = $añopa."-10-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,11);
$fecha11pa = $añopa."-11-".$ultimoDiapa;
$ultimoDiapa = getUltimoDiaMes($añopa,12);
$fecha12pa = $añopa."-12-".$ultimoDiapa;

$gvca1pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia1pa, $fecha1pa])->sum('total_bs');
$gvco1pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia1pa, $fecha1pa])->sum('precio');
$eneropa = $gvca1pa+$gvco1pa; // 350

$gvca2pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia2pa, $fecha2pa])->sum('total_bs');
$gvco2pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia2pa, $fecha2pa])->sum('precio');
$febrepa = $gvca2pa+$gvco2pa; // 70

$gvca3pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia3pa, $fecha3pa])->sum('total_bs');
$gvco3pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia3pa, $fecha3pa])->sum('precio');
$marzopa = $gvca3pa+$gvco3pa;

$gvca4pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia4pa, $fecha4pa])->sum('total_bs');
$gvco4pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia4pa, $fecha4pa])->sum('precio');
$abrilpa = $gvca4pa+$gvco4pa;

$gvca5pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia5pa, $fecha5pa])->sum('total_bs');
$gvco5pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia5pa, $fecha5pa])->sum('precio');
$mayospa = $gvca5pa+$gvco5pa;

$gvca6pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia6pa, $fecha6pa])->sum('total_bs');
$gvco6pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia6pa, $fecha6pa])->sum('precio');
$juniopa = $gvca6pa+$gvco6pa;

$gvca7pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia7pa, $fecha7pa])->sum('total_bs');
$gvco7pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia7pa, $fecha7pa])->sum('precio');
$juliopa = $gvca7pa+$gvco7pa;

$gvca8pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia8pa, $fecha8pa])->sum('total_bs');
$gvco8pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia8pa, $fecha8pa])->sum('precio');
$agostpa = $gvca8pa+$gvco8pa;

$gvca9pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia9pa, $fecha9pa])->sum('total_bs');
$gvco9pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia9pa, $fecha9pa])->sum('precio');
$septipa = $gvca9pa+$gvco9pa;

$gvca10pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia10pa, $fecha10pa])->sum('total_bs');
$gvco10pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia10pa, $fecha10pa])->sum('precio');
$octubpa = $gvca10pa+$gvco10pa;

$gvca11pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia11pa, $fecha11pa])->sum('total_bs');
$gvco11pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia11pa, $fecha11pa])->sum('precio');
$noviepa = $gvca11pa+$gvco11pa;

$gvca12pa = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia12pa, $fecha12pa])->sum('total_bs');
$gvco12pa = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia12pa, $fecha12pa])->sum('precio');
$diciepa = $gvca12pa+$gvco12pa;
//


// Esto es para obtener el año con el mes y el ultimo dia
$ultimoDia = getUltimoDiaMes($año,1);
$fecha1 = $año."-01-".$ultimoDia; //2020-01-31
$ultimoDia = getUltimoDiaMes($año,2);
$fecha2 = $año."-02-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,3);
$fecha3 = $año."-03-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,4);
$fecha4 = $año."-04-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,5);
$fecha5 = $año."-05-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,6);
$fecha6 = $año."-06-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,7);
$fecha7 = $año."-07-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,8);
$fecha8 = $año."-08-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,9);
$fecha9 = $año."-09-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,10);
$fecha10 = $año."-10-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,11);
$fecha11 = $año."-11-".$ultimoDia;
$ultimoDia = getUltimoDiaMes($año,12);
$fecha12 = $año."-12-".$ultimoDia;


    $gvca1 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia1, $fecha1])->sum('total_bs');
    $gvco1 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia1, $fecha1])->sum('precio');
    $enero = $gvca1+$gvco1; // 350

    $gvca2 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia2, $fecha2])->sum('total_bs');
    $gvco2 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia2, $fecha2])->sum('precio');
    $febre = $gvca2+$gvco2; // 70

    $gvca3 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia3, $fecha3])->sum('total_bs');
    $gvco3 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia3, $fecha3])->sum('precio');
    $marzo = $gvca3+$gvco3;

    $gvca4 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia4, $fecha4])->sum('total_bs');
    $gvco4 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia4, $fecha4])->sum('precio');
    $abril = $gvca4+$gvco4;

    $gvca5 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia5, $fecha5])->sum('total_bs');
    $gvco5 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia5, $fecha5])->sum('precio');
    $mayos = $gvca5+$gvco5;

    $gvca6 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia6, $fecha6])->sum('total_bs');
    $gvco6 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia6, $fecha6])->sum('precio');
    $junio = $gvca6+$gvco6;

    $gvca7 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia7, $fecha7])->sum('total_bs');
    $gvco7 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia7, $fecha7])->sum('precio');
    $julio = $gvca7+$gvco7;

    $gvca8 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia8, $fecha8])->sum('total_bs');
    $gvco8 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia8, $fecha8])->sum('precio');
    $agost = $gvca8+$gvco8;

    $gvca9 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia9, $fecha9])->sum('total_bs');
    $gvco9 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia9, $fecha9])->sum('precio');
    $septi = $gvca9+$gvco9;

    $gvca10 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia10, $fecha10])->sum('total_bs');
    $gvco10 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia10, $fecha10])->sum('precio');
    $octub = $gvca10+$gvco10;

    $gvca11 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia11, $fecha11])->sum('total_bs');
    $gvco11 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia11, $fecha11])->sum('precio');
    $novie = $gvca11+$gvco11;

    $gvca12 = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$dia12, $fecha12])->sum('total_bs');
    $gvco12 = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$dia12, $fecha12])->sum('precio');
    $dicie = $gvca12+$gvco12;

?>

<section class="content">
    <div class="container-fluid">
        <div class="col-12 col-sm-12 col-lg-12 mx-auto">
            <div class="card card-widget widget-user">
                <div class="widget-user-header text-white"
                    style="background: url('/img/welcome/potosi2.jpg') center center;">
                    <h3 class="widget-user-username text-right">GRÁFICAS</h3>
                    <h5 class="widget-user-desc text-right">Sport La Comita</h5>
                </div>
                <div class="widget-user-image">
                    <img style="border:none;" src="{{ asset('img/sidebar/resultados.svg') }}" alt="reportes">
                </div>
                <div class="card-body pt-0" >
                    <div class="text-center p-2">
                        <a class="nav-link active text-white"> <strong> GRÁFICAS DE LAS VENTAS </strong></a>
                    </div>
                    <div class="row justify-content-center">
                        <canvas id="generalVentas" width="400" height="400"></canvas>
                    </div>
                    <hr>
                    <a class="nav-link active text-center">REPORTE GENERAL DE VENTAS EN BS.</a>
                    <div class="row justify-content-center">
                        <canvas id="graficaVentaBs" width="400" height="400"></canvas>
                    </div>
                    <hr>
                    <a class="nav-link active text-center">REPORTE DE LOS 5 ITEMS MÁS VENDIDOS DEL {{ $dia1 }} AL {{ $diac }} </a>
                    <div class="row justify-content-center">
                        <canvas id="itemventa" width="400" height="400"></canvas>
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
<script src="{{ asset('fonts/utils.js') }}" ></script>

<script>

    var enero = parseInt('<?php echo $enero; ?>');
    var febrero = parseInt('<?php echo $febre; ?>');
    var marzo = parseInt('<?php echo $marzo; ?>');
    var abril = parseInt('<?php echo $abril; ?>');
    var mayo = parseInt('<?php echo $mayos; ?>');
    var junio = parseInt('<?php echo $junio; ?>');
    var julio = parseInt('<?php echo $julio; ?>');
    var agosto = parseInt('<?php echo $agost; ?>');
    var septiembre = parseInt('<?php echo $septi; ?>');
    var octubre = parseInt('<?php echo $octub; ?>');
    var noviembre = parseInt('<?php echo $novie; ?>');
    var diciembre = parseInt('<?php echo $dicie; ?>');
    var date = '<?php echo $año; ?>';

    var diact = '<?php echo $diac; ?>';
    var eneropa = parseInt('<?php echo $eneropa; ?>');
    var febreropa = parseInt('<?php echo $febrepa; ?>');
    var marzopa = parseInt('<?php echo $marzopa; ?>');
    var abrilpa = parseInt('<?php echo $abrilpa; ?>');
    var mayopa = parseInt('<?php echo $mayospa; ?>');
    var juniopa = parseInt('<?php echo $juniopa; ?>');
    var juliopa = parseInt('<?php echo $juliopa; ?>');
    var agostopa = parseInt('<?php echo $agostpa; ?>');
    var septiembrepa = parseInt('<?php echo $septipa; ?>');
    var octubrepapa = parseInt('<?php echo $octubpa; ?>');
    var noviembrepa = parseInt('<?php echo $noviepa; ?>');
    var diciembrepa = parseInt('<?php echo $diciepa; ?>');
    //alert(enero);
var ctx = document.getElementById('generalVentas');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [{
            label: 'REPORTE GENERAL DE VENTAS - Bs.',
            data: [ enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'CANTIDAD (Bs.)'
                }
            }]
        }
    }
});
</script>


<script>
    var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    var config = {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{
                label: 'Año anterior 2018',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [eneropa,febreropa,marzopa,abrilpa,mayopa,juniopa,juliopa,agostopa,septiembrepa,octubrepapa,noviembrepa,diciembrepa],
                fill: false,
            }, {
                label: 'Año actual '+date,
                fill: false,
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data: [enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre],
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'MESES'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'VALORES EN BOLIVIANOS'
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('graficaVentaBs').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };
</script>


<script>
<?php
    $nom1  = $nom1;
    $canti1 = $cant1;
    $nom2  = $nom2;
    $canti2 = $cant2;
    $nom3  = $nom3;
    $canti3 = $cant3;
    $nom4  = $nom4;
    $canti4 = $cant4;
    $nom5  = $nom5;
    $canti5 = $cant5;

?>
     var primaro = parseInt('<?php echo $canti1; ?>');
     var prinom = ('<?php echo $nom1; ?>');
     var segundo = parseInt('<?php echo $canti2; ?>');
     var senom = ('<?php echo $nom2; ?>');
     var tercero = parseInt('<?php echo $canti3; ?>');
     var ternom = ('<?php echo $nom3; ?>');
     var cuarto = parseInt('<?php echo $canti4; ?>');
     var cuanom = ('<?php echo $nom4; ?>');
     var quinto = parseInt('<?php echo $canti5; ?>');
     var quinom = ('<?php echo $nom5; ?>');



var ctx = document.getElementById('itemventa');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [quinom, cuanom, ternom, senom, prinom],
        datasets: [{
            label: 'El producto más vendido' ,
            data: [ quinto,cuarto,tercero,segundo,primaro],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'El producto más vendido hasta el '+diact+' es '+prinom+' con '+primaro+' unidades.',
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'PRODUCTOS'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'CANTIDAD (Unid.)'
                }
            }]
        }
    }
});
</script>

@endpush
