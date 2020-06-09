<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tallas = Talla::orderBy('id', 'DESC')->paginate();
        return view('admin.tallas.index', compact('tallas'));
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
        $this->validate($request, [
            'nombre' => 'required'
        ]);
        //dd($request->all());
        $talla = new Talla();
        $talla->nombre = $request['nombre'];
        $talla->slug = Str::of($request['nombre'])->slug('-');
        $talla->descripcion = $request['descripcion'];
        $talla->save();
        return redirect('admin/tallas#')->with('success', 'Nueva talla creada correctamente');
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
    public function edit($slug)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $talla = Talla::findOrFail($request->talla_id);
        $talla->nombre = $request['nombre'];
        $talla->descripcion = $request['descripcion'];
        $talla->save();
        return redirect('admin/tallas')->with('success', 'Talla actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($slug)
    {
        $talla = Talla::where('slug',$slug)->update(['estado'=>false]);
        return redirect('admin/tallas')->with('success', 'La talla fue dada de Baja');
    }
}
