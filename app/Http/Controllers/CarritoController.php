<?php

namespace App\Http\Controllers;

use App\Models\CarritoDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function update()
    {
        $carrito = auth()->user()->carrito;

        $detalles = CarritoDetalle::where('carrito_id',$carrito->id)->get();

        $montobs = 0;
        foreach($detalles as $detalle){
            $montobs = $montobs + $detalle->subtotal_bs;
        }

        $carrito->codigo = $carrito->id.'/'.date('Y-M-d').'-Carri';
        $carrito->fecha_orden = Carbon::now();
        $carrito->total_bs = $montobs;
        $carrito->estado = "Pendiente";
        $carrito->save();

        return back()->with('success', "Tu pedido se ha registrado correctamente, tienes que realizar pago del 20% en las próximas 72 horas a partir de ahora!");


    }

}
