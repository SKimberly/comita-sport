<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ProductoFoto;
use App\Models\Talla;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("estas aqui");
        Producto::where('codigo',null)->delete();
        //Aqui devuelves a un vista
        $productos = Producto::orderBy('id','DESC')->get();
        //dd(Producto::paginate(10));
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'nombre' => 'required|min:5|max:100|unique:productos,nombre'
        ]);
        $producto = new Producto;
        $producto->nombre = $request['nombre'];
        $producto->slug = Str::of($request['nombre'])->slug('-');
        $producto->save();

        return redirect()->route('admin.productos.edit', $producto->slug);
        /*dd($request->all());
        */

         /*El descuento nos llega en % y aqui lo vovemos en BS. entre el precui unitario por la cantidad
         $des_bs = number_format(($request->precio*$request->cant_descuento)*$request->descuento/100 ,2);*/

    }

    public function storefotos(Request $request, $id)
    {
        //dd($request->all());
        //aqui se guarda en la aplicacion carpeta storage y en la carpteta public con un simbolink link a la carpeta public del proyecto
        $foto = request()->file('foto')->store('public');

        //Aqui se guarda a la base de datos con el metodo Storage propio de laravel
        ProductoFoto::create([
            'imagen' => Storage::url($foto),
            'producto_id' => $id
        ]);

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
        $this->authorize('update', \Auth::user());

        //dd($slug);
        $producto = Producto::where('slug',$slug)->first();
        //Aqui devuelves a la vista donde esta el formulario de registro de productos
        $categorias = Categoria::orderBy('id','DESC')->get();
        //Le mandamos tambien las tallas
        $tallas = Talla::all();
        //Con compact enviamos datos
        $fotos = ProductoFoto::where('producto_id',$producto->id)->get();

        return view('admin.productos.edit', compact('producto','categorias','tallas','fotos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'stock' => 'required|min:1',
            'precio' => 'required|regex:/^[1-9][0-9]+$/i|not_in:0',
            'categoria' => 'required',
            'tallas' => 'required',
        ]);

         $producto = Producto::where('slug',$slug)->first();
         $producto->nombre = $request['nombre'];
         $producto->codigo = $producto->id.'/'.date('Y-M-d h:m').'/'.auth()->user()->id;
         $producto->descripcion = $request['descripcion'];
         $producto->stock = $request['stock'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->descuento = $request['descuento'];
         $producto->cant_descuento = $request['cant_descuento'];
         $producto->oferta = $request['oferta'];
         $producto->estado = true;
         $producto->save();

         $producto->tallas()->sync($request->get('tallas'));

         return redirect('/admin/productos')->with('success', 'Producto creado correctamente!');

    }

    public function deletefotos($id)
    {
        $foto = ProductoFoto::find($id);
        //Aqui eliminamos la foto de la base de datos
        $foto->delete();

        //Aqui eliminamos la foto de nuestra carpeta del sitio Web de la carpeta "STORAGE"
        $rutafoto = str_replace('storage', 'public', $foto->imagen);
        Storage::delete($rutafoto);

        return back()->with('success', "Foto del producto eliminado!");
    }

    public function destroy($id)
    {
        //var_dump($id);
        $producto = Producto::where('id',$id)->update(['estado'=>false]);

        //return redirect('admin/productos');
        // check data deleted or not
         return response()->json(['success'=>'El producto fue dado de baja.']);

    }

    public function prodetalle($slug)
    {
        $producto = Producto::where('slug',$slug)->first();
        $categoria = Categoria::where('id',$producto->categoria_id)->first();
        //$des_bs = number_format(($producto->precio*$producto->cant_descuento)*$producto->descuento/100 ,2);
        return view('admin.productos.detalle', compact('producto','categoria'));

    }

}
