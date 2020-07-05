<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\CarritoPago;
use App\Models\CotiPago;
use App\Models\Cotizacion;
use App\Models\CotizacionFoto;
use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carritos = Carrito::where('estado','Pendiente')->orderBy('id','DESC')->paginate();
        $cotizaciones = Cotizacion::where('estado','Pendiente')->orderBy('id','DESC')->paginate();


        return view('pedidos.index', compact('carritos','cotizaciones' ));


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrito = Carrito::where('id',$id)->first();
        $detalles = CarritoDetalle::where('carrito_id',$id)->get();
        $total = 0;
        return view('pedidos.detallecarri',compact('carrito', 'detalles','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detallecoti($slug)
    {
        $cotizacion = Cotizacion::where('slug',$slug)->first();
        $fotos = CotizacionFoto::where('cotizacion_id',$cotizacion->id)->get();


        return view('pedidos.detallecoti', compact('cotizacion','fotos' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /*public function pedidopago(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'monto' => 'required',
        ]);

        $foto = request()->file('imagen')->store('public/pagos');

        if($request['pedido_tipo']==='carrito'){
            CarritoPago::create([
                'usuario' => auth()->user()->id,
                'monto' => $request['monto'],
                'fecha' => Carbon::now(),
                'descripcion' => $request['descripcion'],
                'imagen' => Storage::url($foto),
                'estado' => 'Esperando',
                'carrito_id' => $request['pedido_id']
            ]);
        }else{
            CotiPago::create([
                'usuario' => auth()->user()->id,
                'monto' => $request['monto'],
                'fecha' => Carbon::now(),
                'descripcion' => $request['descripcion'],
                'imagen' => Storage::url($foto),
                'estado' => 'Esperando',
                'cotizacion_id' => $request['pedido_id']
            ]);
        }


        return redirect('/admin/pagos')->with('success',"La imagen del depósito se envio correctamente!");


    }*/






}
