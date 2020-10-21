<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Categoria::class);

        $materiales = Material::orderBy('id', 'DESC')->paginate();
        return view('admin.materiales.index', compact('materiales'));
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
            'nombre' => 'required|unique:materiales,nombre'
        ]);
        //dd($request->all());
        $material = new Material();
        $material->nombre = $request['nombre'];
        $material->slug = Str::of($request['nombre'])->slug('-');
        $material->descripcion = $request['descripcion'];
        $material->save();

        return redirect('admin/materiales#')->with('success', 'Nuevo material creado correctamente');
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
        $material = Material::findOrFail($request->material_id);
        $material->nombre = $request['nombre'];
        $material->descripcion = $request['descripcion'];
        $material->save();
        return redirect('admin/materiales')->with('success', 'Material actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $material = Material::where('slug',$slug)->update(['estado'=>false]);

        return redirect('admin/materiales')->with('success', 'El material fue dada de Baja');
    }
}
