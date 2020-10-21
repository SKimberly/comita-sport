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
                Categoría: {{ $cate->nombre }}
                <br />
                Fecha: {{ $fecha }}
                </pre>
            </td>
            <td align="center">
                <img src="pdf/logo1.png" alt="Logo" width="90" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>REPORTE POR CATEGORIA DE PRENDA</h3>
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
                <td>{{ $reporte->cam_descuento ? $reporte->descuento : '0'}}</td>
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


<!--

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>
  -->