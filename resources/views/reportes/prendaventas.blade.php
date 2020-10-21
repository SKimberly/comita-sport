<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>POTOSI- SPORT LA COMITA</h3>
                <pre>
                Celular: 70462939<br />
                Email: <a href="">sport.lacomita19@gmail.com</a>
                <br />
                Rango de fechas: {{ $desde }} hasta {{ $hasta }}
                <br />
                Fecha actual: {{ $fecha }}
                </pre>
            </td>
            <td align="center">
                <img src="pdf/logo1.png" alt="Logo" width="90" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>REPORTE POR TIPO DE PRENDA</h3>
                <pre>
                    Tienda: Calle Oruro Nro. 184
                    Fábrica: Calle América esq. San Alberto
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>DESCRIPCIÓN GENERAL:</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Descuento</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $cont = 0;
        @endphp
        @foreach($reportes  as $key => $reporte)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $reporte->nombre }}</td>
                <td>{{ $reporte->precio }}</td>
                <td>{{ $reporte->cantidad }}</td>
                <td>{{ $reporte->cant_descuento ? $reporte->descuento : '0'}}</td>
                <td>{{ $reporte->producto_precio }}</td>
                <td>{{ $reporte->subtotal_bs }}</td>
            </tr>
            @php $cont = $cont+$reporte->subtotal_bs @endphp
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">{{ $cont }} Bs.</td>
        </tr>
        </tfoot>
    </table>
</div>


<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - Derechos reservados.
            </td>
            <td align="right" style="width: 50%;">
                SPORT LA COMITA
            </td>
        </tr>

    </table>
</div>
</body>
</html>
