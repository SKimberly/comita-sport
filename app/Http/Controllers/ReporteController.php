<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Categoria;
use App\Models\Cotizacion;
use App\Models\Itemven;
use App\Models\Producto;
use App\Models\Reportetipo;
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
    public function estadisticas()
    {
        //$gvca1 =  Carrito::where('estado','Finalizado')->whereBetween('fecha_entrega', ['2020-07-01', '2020-07-14'])->sum('total_bs');
        //$gvco1 =  Cotizacion::where('estado','Finalizado')->whereBetween('fecha', ['2020-07-15', '2020-07-22'])->sum('precio');

       // $gv1 = $gvca1+$gvco1;

        //return view('estadistica.index', compact('gv1'));
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

        //dd($itemvalores);
        if(isset($itemvalores[0])){
            //dd("si");
            $nom1  = $itemvalores[0]->producto;
            $cant1 = $itemvalores[0]->cantidad;
        }else{
            //dd("no");
            $nom1  = 'ninguno';
            $cant1 = 0;
        }
        if(isset($itemvalores[1])){
            $nom2  = $itemvalores[1]->producto;
            $cant2 = $itemvalores[1]->cantidad;
        }else{
            $nom2  = 'ninguno';
            $cant2 = 0;
        }
        if(isset($itemvalores[2])){
            $nom3  = $itemvalores[2]->producto;
            $cant3 = $itemvalores[2]->cantidad;
        }else{
            $nom3  = 'ninguno';
            $cant3 = 0;
        }
        if(isset($itemvalores[3])){
            $nom4  = $itemvalores[3]->producto;
            $cant4 = $itemvalores[3]->cantidad;
        }else{
            $nom4  = 'ninguno';
            $cant4 = 0;
        }
        if(isset($itemvalores[4])){
            $nom5  = $itemvalores[4]->producto;
            $cant5 = $itemvalores[4]->cantidad;
        }else{
            $nom5  = 'ninguno';
            $cant5 = 0;
        }

        return view('estadistica.index', compact('nom1','cant1','nom2','cant2','nom3','cant3','nom4','cant4','nom5','cant5'));
    }

    public function aproreciboca($id)
    {
        $carrito = Carrito::find($id);
        $cade = CarritoDetalle::where('carrito_id',$carrito->id)->get();
        $fecha = Carbon::now();

        $view =  \View::make('recibos.aprobadoca', compact('carrito','cade','fecha'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Recibo/'.$fecha->format('d/m/Y').'.pdf');

    }

}