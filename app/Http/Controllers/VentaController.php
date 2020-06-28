<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $carritos = Carrito::where('estado','Procesando')->orWhere('estado','Finalizado')->orderBy('id','DESC')->get();
        $cotizaciones = Cotizacion::where('estado','Procesando')->orWhere('estado','Finalizado')->orderBy('id','DESC')->get();


        return view('ventas.index', compact('carritos','cotizaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function carripago(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'pago' => 'required'
        ]);

        $carrito = Carrito::where('id',$request->carrito_id)->first();

        $pago = $request->pago;

        if(($carrito->anticipo+$pago) > $carrito->total_bs){
            return back()->with('errors','El pago excede al monto total.');
        }

        if(($pago+$carrito->anticipo) == $carrito->total_bs){
            Carrito::where('id',$request->carrito_id)->update([
                'anticipo'=> $carrito->anticipo+$pago,
                'estado' => 'Finalizado'
            ]);
        }else{
            Carrito::where('id',$request->carrito_id)->update([
                'anticipo'=> $carrito->anticipo+$pago
            ]);
        }
        return back()->with('success','Excelente! El pago fue registrado.');
    }

    public function cotipago(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'pago' => 'required'
        ]);

        $cotizacion = Cotizacion::where('id',$request->cotizacion_id)->first();

        $pago = $request->pago;

        if(($cotizacion->anticipo+$pago) > $cotizacion->precio){
            return back()->with('errors','El pago excede al monto total.');
        }

        if(($pago+$cotizacion->anticipo) == $cotizacion->precio){
            Cotizacion::where('id',$request->cotizacion_id)->update([
                'anticipo'=> $cotizacion->anticipo+$pago,
                'estado' => 'Finalizado'
            ]);
        }else{
            Cotizacion::where('id',$request->cotizacion_id)->update([
                'anticipo'=> $cotizacion->anticipo+$pago
            ]);
        }
        return back()->with('success','Excelente! El pago de la cotización fue registrado.');
    }


}
