<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Cotizacion;
use App\Models\Reportetipo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('reportes.index',compact('categorias'));
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
    public function vertipo(Request $request)
    {
        Reportetipo::where('nombre','!=',$request['categoria'])->delete();
        //dd($request['categoria']);
        $desde = $request->inicio;
        $hasta = $request->final;

        $carritos = Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', [$desde, $hasta])->get();
        foreach($carritos as $carrito){
            foreach($carrito->carrito_detalles as $detalle){
                $tipo = $detalle->producto->categoria->id;
                if($tipo == $request['categoria']){
                    $tipocarrito = new Reportetipo();
                    $tipocarrito->nombre = $detalle->producto->nombre;
                    $tipocarrito->precio = $detalle->producto->precio;
                    $tipocarrito->descuento = $detalle->producto->descuento;
                    $tipocarrito->cant_descuento = $detalle->producto->cant_descuento;
                    $tipocarrito->producto_precio = $detalle->producto_precio;
                    $tipocarrito->cantidad = $detalle->cantidad;
                    $tipocarrito->subtotal_bs = $detalle->subtotal_bs;
                    $tipocarrito->categoria_id = $detalle->producto->categoria_id;
                    $tipocarrito->save();
                }
            }
        }
        $reportes = Reportetipo::get();
        //dd($reportes);

        $fecha = Carbon::now();
        $user = auth()->user()->fullname;
        //dd($fecha->format('d M'));
        //dd($pedidos);
        $view =  \View::make('reportes.tipoventas', compact('reportes','fecha','desde','hasta','user'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Reporte-Ventas/'.$fecha->format('d/m/Y').'.pdf');

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
