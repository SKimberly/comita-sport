<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Notifications\MensajeSent;
use App\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'contenido' => 'required'
        ]);


        $clicoti = $request['cotiuser_id'];
        $admin = User::where('tipo','Administrador')->pluck('id')->first();

        if(auth()->user()->id == $admin)
        {
            Mensaje::create([
                'envia' =>  $admin,
                'recibe' =>  $clicoti,
                'contenido' => $request['contenido'],
                'cotizacion_id' => $request['cotizacion_id']
            ]);
        }else{
            Mensaje::create([
                'envia' =>  $clicoti,
                'recibe' =>  $admin,
                'contenido' => $request['contenido'],
                'cotizacion_id' => $request['cotizacion_id']
            ]);
        }

        return back()->with('success', 'Tu mensaje fue enviado con exito');

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
