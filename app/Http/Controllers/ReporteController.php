<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Categoria;
use App\Models\Cotizacion;
use App\Models\Itemven;
use App\Models\Producto;
use App\Models\Reportetipo;
use App\Policies\viewAny;
use App\User;
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
        $this->authorize('viewAny', User::class);
        $categorias = Categoria::get();
        $productos = Producto::get();
        return view('reportes.index',compact('categorias','productos'));
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
        $cate = Categoria::where('id',$request['categoria'])->first();
        //dd($pedidos);
        $view =  \View::make('reportes.tipoventas', compact('reportes','fecha','desde','hasta','user','cate'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Reporte-Ventas/'.$fecha->format('d/m/Y').'.pdf');

    }

    public function vercoti(Request $request)
    {
        //dd($request['categoria']);
        $desde = $request->inicio;
        $hasta = $request->final;

        $cotizaciones = Cotizacion::where('estado','Finalizado')->whereBetween('fecha', [$desde, $hasta])->get();

        $fecha = Carbon::now();
        $user = auth()->user()->fullname;
        //dd($fecha->format('d M'));
        //dd($pedidos);
        $view =  \View::make('reportes.cotiventas', compact('cotizaciones','fecha','desde','hasta','user'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Reporte-Ventas/'.$fecha->format('d/m/Y').'.pdf');

    }

    public function verprenda(Request $request)
    {
        //dd($request->all());
        Reportetipo::where('nombre','!=',$request['producto'])->delete();
        //dd($request['producto']
        $desde = $request->inicio;
        $hasta = $request->final;

        $cadetalles = CarritoDetalle::where('producto_id',$request['producto'])->get();

        foreach($cadetalles as $cadetalle){
            $carrito = Carrito::where('id',$cadetalle->carrito_id)->whereBetween('fecha_entrega', [$desde, $hasta])->first();
            if($carrito){
                if($carrito->estado === 'Finalizado'){
                    $prenda = new Reportetipo();
                    $prenda->nombre = $cadetalle->producto->nombre;
                    $prenda->precio = $cadetalle->producto->precio;
                    $prenda->descuento = $cadetalle->producto->descuento;
                    $prenda->cant_descuento = $cadetalle->producto->cant_descuento;
                    $prenda->producto_precio = $cadetalle->producto_precio;
                    $prenda->cantidad = $cadetalle->cantidad;
                    $prenda->subtotal_bs = $cadetalle->subtotal_bs;
                    $prenda->categoria_id = $cadetalle->carrito_id;
                    $prenda->save();
                }
            }

        }
        $reportes = Reportetipo::get();
        //dd($reportes);

        $fecha = Carbon::now();
        $user = auth()->user()->fullname;
        //dd($fecha->format('d M'));
        //dd($pedidos);
        $view =  \View::make('reportes.prendaventas', compact('reportes','fecha','desde','hasta','user'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Reporte-Ventas-Prenda/'.$fecha->format('d/m/Y').'.pdf');

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
    public function estadisticas()
    {
        $this->authorize('viewAny', User::class);

        //\DB::table('itemvens')->delete();
        Itemven::where('cantidad','!=',2500)->delete();
        $carritos = Carrito::where('estado','Finalizado')->get();
        foreach($carritos as $carrito)
        {
            foreach($carrito->carrito_detalles as $cade)
            {
                $pronom = Producto::find($cade->producto_id);
                $item = new Itemven;
                $item->producto = $pronom->nombre;
                $item->cantidad = $cade->cantidad;
                $item->save();
            }
        }
        $items = Itemven::get();
        //dd($items);
        $itemvalores = \DB::table('itemvens')
        ->select('producto', \DB::raw('SUM(cantidad) as cantidad'))
        ->groupBy('producto')
        ->orderBy('cantidad','DESC')
        ->limit(5)
        ->get();

        //dd($itemvalores[0]->producto);

        $nom1  = $itemvalores[0]->producto;
        $cant1 = $itemvalores[0]->cantidad;
        $nom2  = $itemvalores[1]->producto;
        $cant2 = $itemvalores[1]->cantidad;
        $nom3  = $itemvalores[2]->producto;
        $cant3 = $itemvalores[2]->cantidad;
        $nom4  = $itemvalores[3]->producto;
        $cant4 = $itemvalores[3]->cantidad;
        $nom5  = $itemvalores[4]->producto;
        $cant5 = $itemvalores[4]->cantidad;

        return view('estadistica.index', compact('nom1','cant1','nom2','cant2','nom3','cant3','nom4','cant4','nom5','cant5'));
    }

}

