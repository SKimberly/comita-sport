<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoPago;
use App\Models\CotiPago;
use App\Models\Cotizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->tipo === 'Administrador'){
            $carripagos = CarritoPago::where('estado','Pendiente')->orderBy('id','DESC')->get();
            $cotipagos = CotiPago::where('estado','Pendiente')->orderBy('id','DESC')->get();
        }else{
            $carripagos = CarritoPago::where('usuario',auth()->user()->id)->orderBy('id','DESC')->get();
            $cotipagos = CotiPago::where('usuario',auth()->user()->id)->orderBy('id','DESC')->get();
        }

        return view('pagos.index', compact('carripagos', 'cotipagos'));

    }

    public function carripago(Request $request)
    {
        //dd($request->all());


        $carrito = Carrito::where('id',$request->carrito_id)->first();

        if($carrito->fecha_entrega){
            $this->validate($request, [
                'pago' => 'required'
            ]);
            $fecha = $carrito->fecha_entrega;
        }else{
            $this->validate($request, [
                'pago' => 'required',
                'fecha_entrega' => 'required'
            ]);
        }
        if($request['fecha_entrega']){
            $fecha = $request['fecha_entrega'];
        }

        $pago = $request->pago;

        if(($carrito->anticipo+$pago) > $carrito->total_bs){
            return back()->with('errors','El pago excede al monto total.');
        }

        if(($pago+$carrito->anticipo) == $carrito->total_bs){
            Carrito::where('id',$request->carrito_id)->update([
                'anticipo'=> $carrito->anticipo+$pago,
                'fecha_entrega' => $fecha,
                'estado' => 'Finalizado'
            ]);
            return redirect('/admin/ventas')->with('success','Excelente! El pago del pedido fue registrado y finalizado.');
        }else{
            Carrito::where('id',$request->carrito_id)->update([
                'anticipo'=> $carrito->anticipo+$pago,
                'fecha_entrega' => $fecha
            ]);
            return back()->with('success','Excelente! El pago fue registrado.');
        }

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
            return redirect('/admin/ventas')->with('success','Excelente! El pago de la cotización fue registrado y finalizado.');
        }else{
            Cotizacion::where('id',$request->cotizacion_id)->update([
                'anticipo'=> $cotizacion->anticipo+$pago
            ]);
            return back()->with('success','Excelente! El pago de la cotización fue registrado.');
        }

    }



    public function imgpagocarri($id)
    {
        //dd($id);
        $pedido = Carrito::find($id);
        $tipo = "carrito";
        return view('pagos.create',compact('pedido','tipo' ));

    }

    public function imgpagocoti($slug)
    {
        $pedido = Cotizacion::where('slug',$slug)->first();
        $tipo = "cotizacion";

        return view('pagos.create',compact('pedido','tipo' ));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'foto' => 'required',
            'monto' => 'required',
        ]);

        $foto = request()->file('foto')->store('public/pagos');

        if($request['tipo'] === 'carrito'){
            $idca = Carrito::where('codigo',$request['codigo'])->first();
            //dd($idca->id);
            CarritoPago::create([
                'usuario' => auth()->user()->id,
                'monto' => $request['monto'],
                'fecha' => Carbon::now(),
                'imagen' => Storage::url($foto),
                'descripcion' => $request['descripcion'],
                'estado' => 'Pendiente',
                'carrito_id' => $idca->id
            ]);
        }else{
           $idco = Cotizacion::where('codigo',$request['codigo'])->first();
            //dd($idco->id);
            CotiPago::create([
                'usuario' => auth()->user()->id,
                'monto' => $request['monto'],
                'fecha' => Carbon::now(),
                'imagen' => Storage::url($foto),
                'descripcion' => $request['descripcion'],
                'estado' => 'Pendiente',
                'cotizacion_id' => $idco->id
            ]);
        }

        return redirect('/admin/pagos')->with('success','Imagen enviada para su revisión.');

    }

    public function verifycarri($id)
    {
        $pago = CarritoPago::where('carrito_id',$id)->first();
        $tipo = "carrito";
        return view('pagos.edit', compact('pago','tipo'));
    }
    public function verifycoti($id)
    {
        $pago = CotiPago::where('cotizacion_id',$id)->first();
        $tipo = "cotizacion";
        return view('pagos.edit', compact('pago','tipo'));
    }

    public function resverify(Request $request, $id)
    {
        //dd($request->all());
        if($request['btnrespuesta'] === 'Aceptado')
        {
            if($request['tipo'] === 'carrito')
            {
                $carrito = Carrito::where('id', $request['tipococa_id'])->first();
                if($carrito->fecha_entrega)
                {

                }else{
                    $this->validate($request, [
                        'fecha' => 'required'
                    ]);
                    Carrito::where('id', $request['tipococa_id'])->update(['fecha_entrega' => $request['fecha']]);
                }
                $carripago = CarritoPago::find($id);

                if($carrito->anticipo+$carripago->monto > $carrito->total_bs)
                {
                    $carripago->estado = 'Rechazado';
                    $carripago->respuesta = 'El monto del pago excede al precio total del pedido.';
                    $carripago->save();
                    return redirect('/admin/pagos')->with('errors', 'El monto del pago excede al precio total del pedido.');

                }elseif($carrito->anticipo+$carripago->monto == $carrito->total_bs){

                    $carripago->estado = 'Aceptado';
                    $carripago->respuesta = $request['respuesta'];
                    $carripago->save();
                    Carrito::where('id', $request['tipococa_id'])->update([
                        'anticipo' => $carrito->anticipo+$carripago->monto,
                        'estado' => 'Finalizado'
                    ]);
                    return redirect('/admin/ventas')->with('success', 'Pago Aceptado y Finalizado.');

                }else{
                    $carripago->estado = 'Aceptado';
                    $carripago->respuesta = $request['respuesta'];
                    $carripago->save();
                    Carrito::where('id', $request['tipococa_id'])->update(['anticipo' => $carrito->anticipo+$carripago->monto]);
                }
                return redirect('/admin/aprobados')->with('success', 'Pago Aceptado y registrado.');

            }else{
                $cotizacion = Cotizacion::where('id', $request['tipococa_id'])->first();

                $cotipago = CotiPago::find($id);

                if($cotizacion->anticipo+$cotipago->monto > $cotizacion->precio){
                    $cotipago->estado = 'Rechazado';
                    $cotipago->respuesta = 'El monto del pago excede al precio total de la cotización.';
                    $cotipago->save();
                    return redirect('/admin/pagos')->with('errors', 'El monto del pago excede al precio total de la cotización.');
                }elseif($cotizacion->anticipo+$cotipago->monto == $cotizacion->precio){
                    $cotipago->estado = 'Aceptado';
                    $cotipago->respuesta = $request['respuesta'];
                    $cotipago->save();
                    Cotizacion::where('id', $request['tipococa_id'])->update([
                        'anticipo' => $cotizacion->anticipo+$cotipago->monto,
                        'estado' => 'Finalizado'
                    ]);
                    return redirect('/admin/ventas')->with('success', 'Pago de la cotización Aceptado y Finalizado.');

                }else{
                    $cotipago->estado = 'Aceptado';
                    $cotipago->respuesta = $request['respuesta'];
                    $cotipago->save();
                    Cotizacion::where('id', $request['tipococa_id'])->update(['anticipo' => $cotizacion->anticipo+$cotipago->monto]);
                }
                return redirect('/admin/aprobados')->with('success', 'Pago Aceptado y registrado.');


            }

        }else{
            $this->validate($request, [
                'respuesta' => 'required'
            ]);
            if($request['tipo'] === 'carrito'){
                CarritoPago::where('id',$id)->update([
                    'estado' => 'Rechazado',
                    'respuesta' => $request['respuesta']
                ]);
            }else{
                CotiPago::where('id',$id)->update([
                    'estado' => 'Rechazado',
                    'respuesta' => $request['respuesta']
                ]);
            }
            return redirect('/admin/aprobados')->with('success', 'Pago fue Rechazado.');

        }
    }

}
