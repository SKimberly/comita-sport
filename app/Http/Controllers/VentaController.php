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


            $carritos = Carrito::where('estado','Procesando')->orWhere('estado','Finalizado')->get();
            $cotizaciones = Cotizacion::where('estado','Procesando')->orWhere('estado','Finalizado')->get();


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
