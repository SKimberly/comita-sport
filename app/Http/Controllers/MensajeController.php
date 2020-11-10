<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Cotizacion;
use App\Models\Mensaje;
use App\Notifications\MensajeSent;
use App\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function fetchMessage($id)
    {
        //dd($slug);
        $cotizacion = Cotizacion::where('id',$id)->first();
        $mensajes = Mensaje::where('cotizacion_id',$cotizacion->id)->get();
        return $mensajes;
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'mensaje' => 'required'
        ]);

        $cotizacion = Cotizacion::where('id',$request['idcoti'])->first();

        $admin = User::where('tipo','Administrador')->pluck('fullname')->first();
        $adminid = User::where('tipo','Administrador')->pluck('id')->first();
        $cliente = User::where('id',$cotizacion->user_id)->pluck('fullname')->first();

        if($request['userauth'] == $adminid)
        {
            $mensaje = Mensaje::create([
                'user_id' => $request['userauth'],
                'envia' =>  $admin,
                'recibe' =>  $cliente,
                'contenido' => $request['mensaje'],
                'cotizacion_id' => $request['idcoti']
            ]);

            broadcast(new MessageSent($mensaje))->toOthers();
        }else{
            $mensaje = Mensaje::create([
                'user_id' => $request['userauth'],
                'envia' =>  $cliente,
                'recibe' =>  $admin,
                'contenido' => $request['mensaje'],
                'cotizacion_id' => $request['idcoti']
            ]);

            broadcast(new MessageSent($mensaje))->toOthers();
        }


        return ['status'=>'success'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$nombre = User::where('id',$id)->pluck('fullname');
        //return response()->json($nombre);
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
        return $id;
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
