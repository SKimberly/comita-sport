<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Recibo de compra</title>
    <link href="{{ asset('pdf/style.css') }}" rel="stylesheet">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="pdf/logo1.png">
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">RECIBO DE COMPRA</div>
          <h2 class="name">Fabrica de ropa "Sport La Comita"</h2>
          <h3 class="name">Cliente: {{ $carrito->user->fullname }} </h3>
          <div class="address">Calle Oruro Nro. 184 - Calle América esq. San Alberto </div>
          <div class="email"><a href="mailto:john@example.com">sport.lacomita19@gmail.com</a></div>
          Código: {{ $carrito->codigo }} <br />
          Fecha: {{ $carrito->fecha_entrega}} <br />
          Anticipo: {{ $carrito->anticipo }} <br />
          Precio total: {{ $carrito->total_bs }} <br />
          Estado: {{ $carrito->estado }} <br />
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th class="unit">PRECIO </th>
            <th class="qty">CANTIDAD</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cade as $key => $repro)
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Nombre</h3>{{ $repro->producto->nombre }}</td>
            <td class="unit">{{ $repro->producto->precio }}</td>
            <td class="qty">{{ $repro->cantidad }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2"> </td>
            <td> </td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td> </td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2"> </td>
            <td> </td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">¡Gracias por su preferencia!</div>

    </main>
    <footer>
      "Sistema web Sport La Comita" {{ date('Y') }} Celular 70462939
    </footer>
  </body>
</html>











