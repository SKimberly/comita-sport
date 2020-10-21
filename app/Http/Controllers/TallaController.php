<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TallaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Categoria::class);

        $tallas = Talla::orderBy('id', 'DESC')->paginate();
        return view('admin.tallas.index', compact('tallas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:tallas,nombre'
        ]);
        //dd($request->all());
        $talla = new Talla();
        $talla->nombre = $request['nombre'];
        $talla->slug = Str::of($request['nombre'])->slug('-');
        $talla->descripcion = $request['descripcion'];
        $talla->save();

        return redirect('admin/tallas#')->with('success', 'Nueva talla creada correctamente');
    }

    public function edit($id)
    {


    }

    public function update(Request $request)
    {
        //dd($request->all());
        $talla = Talla::findOrFail($request->talla_id);
        $talla->nombre = $request['nombre'];
        $talla->descripcion = $request['descripcion'];
        $talla->save();
        //return back();
        return redirect('admin/tallas')->with('success', 'Talla actualizada correctamente');
    }

    public function destroy($slug)
    {
        $talla = Talla::where('slug',$slug)->update(['estado'=>false]);

        return redirect('admin/tallas')->with('success', 'La categoria fue dada de Baja');
    }

}
