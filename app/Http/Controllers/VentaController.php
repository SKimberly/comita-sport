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
        if(auth()->user()->tipo === 'Administrador'){
            $carritos = Carrito::where('estado','Finalizado')->orderBy('id','DESC')->get();
            $cotizaciones = Cotizacion::where('estado','Finalizado')->orderBy('id','DESC')->get();
        }else{
            $carritos = Carrito::where('user_id',auth()->user()->id)->where('estado','Finalizado')->orderBy('id','DESC')->paginate();
            $cotizaciones = Cotizacion::where('user_id',auth()->user()->id)->where('estado','Finalizado')->orderBy('id','DESC')->paginate();
        }

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





}
