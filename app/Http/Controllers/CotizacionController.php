<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionFoto;
use App\Models\Material;
use App\Models\Mensaje;
use App\Models\Talla;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CotizacionController extends Controller
{


    public function index()
    {

        Cotizacion::where('codigo',null)->delete();
        if(auth()->user()->tipo === 'Administrador'){
            $cotizaciones = Cotizacion::where('estado','Activo')->orderBy('id','DESC')->paginate();
        }else{
            $cotizaciones = Cotizacion::where('user_id',auth()->user()->id)->where('estado','Activo')->orderBy('id','DESC')->paginate();
        }

        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|min:5|max:100'
        ]);
        $cotizacion = new Cotizacion;
        $cotizacion->nombre = $request['nombre'];
        $cotizacion->slug = Str::of($request['nombre'])->slug('-');
        $cotizacion->user_id = auth()->user()->id;
        $cotizacion->save();

        return redirect()->route('admin.cotizaciones.edit', $cotizacion->slug);

    }

    public function edit($slug)
    {
        //dd($slug);
        $cotizacion = Cotizacion::where('slug',$slug)->first();
        //Le mandamos tambien las tallas
        $tallas = Talla::all();
        $materiales = Material::all();
        //Con compact enviamos datos
        $fotos = CotizacionFoto::where('cotizacion_id',$cotizacion->id)->get();

        return view('cotizaciones.edit', compact('cotizacion','tallas','materiales','fotos'));

    }

    public function update(Request $request, $slug)
    {
        //dd($request->all());
        $this->validate($request, [
            'cantidad' => 'required|min:1',
            'tallas' => 'required',
            'descripcion' => 'required',
        ]);

         $cotizacion = Cotizacion::where('slug',$slug)->first();
         $cotizacion->nombre = $request['nombre'];
         $cotizacion->codigo = $cotizacion->id.'/'.date('Y-M-d').'/'.date('h:m').'/'.auth()->user()->id;
         $cotizacion->descripcion = $request['descripcion'];
         $cotizacion->cantidad = $request['cantidad'];
         $cotizacion->estado = 'Activo';
         $cotizacion->save();

         $cotizacion->tallas()->sync($request->get('tallas'));
         $cotizacion->materiales()->sync($request->get('materiales'));

         return redirect('/admin/cotizaciones')->with('success', 'La cotización fue creada  correctamente!');

    }

    public function storefotos(Request $request, $id)
    {
        //dd($request->all());
        //aqui se guarda en la aplicacion carpeta storage y en la carpteta public con un simbolink link a la carpeta public del proyecto
        $foto = request()->file('foto')->store('public');

        //Aqui se guarda a la base de datos con el metodo Storage propio de laravel
        CotizacionFoto::create([
            'imagen' => Storage::url($foto),
            'cotizacion_id' => $id
        ]);

    }

    public function deletefotos($id)
    {
        $foto = CotizacionFoto::find($id);
        //Aqui eliminamos la foto de la base de datos
        $foto->delete();

        //Aqui eliminamos la foto de nuestra carpeta del sitio Web de la carpeta "STORAGE"
        $rutafoto = str_replace('storage', 'public', $foto->imagen);
        Storage::delete($rutafoto);

        return back()->with('success', "La imagen de la cotización fue eliminada!");
    }

    public function show($slug)
    {
        $cotizacion = Cotizacion::where('slug',$slug)->first();
        $fotos = CotizacionFoto::where('cotizacion_id',$cotizacion->id)->get();

        $mensajes = Mensaje::where('cotizacion_id',$cotizacion->id)->orderBy('id','ASC')->get();

        return view('cotizaciones.show', compact('cotizacion','fotos','mensajes' ));
    }

    public function destroy($id)
    {

        $cotizacion = Cotizacion::where('id',$id)->first();
        $cotizacion->tallas()->detach();
        $cotizacion->materiales()->detach();
        $cotizacion->delete();

        return response()->json(['success'=>'La cotización fue eliminada.']);

    }
    public function moneycoti(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'precio' => 'required',
            'fecha' => 'required'
        ]);

        $cotizacion = Cotizacion::where('id',$request['cotizacion_id'])->first();
        $cotizacion->precio = $request['precio'];
        $cotizacion->fecha = $request['fecha'];
        $cotizacion->estado = 'Pendiente';
        $cotizacion->save();

        return redirect('/admin/pedidos')->with('success', 'La cotización paso a pedidos para su aprobación.');

    }


}
