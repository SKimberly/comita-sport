<?php

namespace App\Http\Controllers;

use App\Models\CarritoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrito = auth()->user()->carrito->where('estado', 'Activo')->first();
        if($carrito){
            $detalles = CarritoDetalle::where('carrito_id',$carrito->id)->get();
            //dd($detalles);
        }else{
            $detalles = "";
        }
        return view('carrito.index',compact('carrito','detalles'));

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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $producto = Producto::where('id',$id)->first();

        $proprecio = ($producto->precio * $request['cantidad']);

        if($producto->descuento && $producto->cant_descuento){
            $prodtobs = (float)(($producto->precio * $producto->cant_descuento)*$producto->descuento/100);
        }else{
            $prodtobs = 0;
        }

        $carrito_detalle = new CarritoDetalle();
        $carrito_detalle->carrito_id = auth()->user()->carrito->id;
        $carrito_detalle->producto_id = $id;
        $carrito_detalle->cantidad = $request['cantidad'];
        $carrito_detalle->especificacion = $request['especificacion'];
        $carrito_detalle->producto_precio = $proprecio;
        $carrito_detalle->descuento_pro = $prodtobs;
        $carrito_detalle->subtotal_bs =  (float)$proprecio - (float)$prodtobs;
        $carrito_detalle->save();

        $carrito_detalle->tallas()->attach($request->get('tallas'));

        return back()->with('success','El producto fue agregado al carrito');

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
        CarritoDetalle::where('id',$id)->delete();
        return back()->with('success','Producto eliminado de su carrito');
    }
}
