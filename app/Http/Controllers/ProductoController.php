<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;
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
        //Aqui devuelves a un vista
        $productos = Producto::orderBy('id','DESC')->paginate();
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
        //Aqui devuelves a la vista donde esta el formulario de registro de productos
        $categorias = Categoria::orderBy('id','DESC')->get();
        //Le mandamos tambien las tallas
        $tallas = Talla::all();
        //Con compact enviamos datos
        return view('admin.productos.create', compact('categorias','tallas'));
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
            'nombre' => 'required|min:5|max:100',
            'stock' => 'required|min:1',
            'precio' => 'required|regex:/^[1-9][0-9]+$/i|not_in:0',
            'categoria' => 'required',
            'tallas' => 'required',
        ]);
        //el descuento nos llega en % y aqui lo volvemos en Bs. entre el precio unitario por la cantidad
        $des_bs = number_format(($request->precio*$request->cant_descuento)*$request->descuento/100 ,2);
        //aqui devolvemos a cualquier vista despues de haber creado los datos
        //dd($request->all());
         $producto = new Producto;
         $producto->nombre = $request['nombre'];
         $producto->slug = Str::of($request['nombre'])->slug('-');
         $producto->descripcion = $request['descripcion'];
         $producto->stock = $request['stock'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->descuento = $request['descuento'];
         $producto->cant_descuento = $request['cant_descuento'];
         $producto->oferta = $request['oferta'];
         $producto->des_oferta = $request['des_oferta'];
         $producto->save();

         //La funcion "attach" adjunta un array depalabras en un sola columna
         $producto->tallas()->attach($request->get('tallas'));

         return redirect('/admin/productos')->with('success', 'Producto creado correctamente!');

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
