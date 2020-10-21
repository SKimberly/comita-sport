<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Categoria::class);

        $categorias = Categoria::orderBy('id','DESC')->paginate();
        return view('admin.categorias.index', compact('categorias'));

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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'nombre' => 'required|unique:categorias,nombre',
        ]);
        // 1) Guardamos la imagen en nuestro proyecto
        $file = $request->file('imagen');  //obtiene lo que se envia el campo con el nombre file
        $path = public_path() . '/img/categorias';  //es la ruta donde guardamos la imagen "public_path()"->es la rutahacia la carpeta public
        $fileName = uniqid() . $file->getClientOriginalName();//Definimos un nombre para el archivo "aqui es un ID unico concatenado con el nombre original del archivo que se sube"
        $moved = $file->move($path, $fileName);//Damos la orden al archivo para que se guarde con ese path y filename //$move=recibira true o false si la imagen guardo correctamente
        if($moved){ //si $move se guardo correctamente se guarda en la base de datos
        // 2) Creamos un registro en la tabla producto_fotos
            $categoriaImage = new Categoria();
            $categoriaImage->imagen = $fileName;//->este nombre $fileName nos permitira mostar el archivo cuando se lo requieras
            $categoriaImage->nombre = $request['nombre'];
            $categoriaImage->slug = Str::of($request['nombre'])->slug('-');
            $categoriaImage->descripcion = $request['descripcion'];
            $categoriaImage->save();//INSERT
        }
        return redirect('/admin/categorias#')->with('success', 'Categoria creada correctamente!');
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
        $this->authorize('viewAny', Categoria::class);
        $categoria = Categoria::where('slug',$slug)->first();
        return view('admin.categorias.edit', compact('categoria'));
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
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        //Primero eliminaremos la imagen del proyecto
        $categoriaFoto = Categoria::where('slug',$slug)->first();
        if(!empty($request['imagen']))//Si el campo imagen no esta vacio => entonces esta enviando una nueva foto
        {
            if(substr($categoriaFoto->imagen, 0, 4)==="http"){
                $deleted = true;
            }else{
                $fullPath = public_path() . '/img/categorias/'.$categoriaFoto->imagen;
                $deleted = File::delete($fullPath);
            }
            if($deleted){
                $categoriaFoto->delete();
            }
            ///////////////////////////////////////////////7CREAMOS//////////////
            $file = $request->file('imagen');  //obtiene lo que se envia el campo con el nombre file
            $path = public_path() . '/img/categorias';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if($moved){
                $categoriaFoto->imagen = $fileName;
            }

        }
        $categoriaFoto->nombre = $request['nombre'];
        $categoriaFoto->descripcion = $request['descripcion'];
        $categoriaFoto->save();

        return redirect('admin/categorias')->with('success', 'Categoria actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $categoria = Categoria::where('slug',$slug)->update(['estado'=>false]);

        return redirect('admin/categorias')->with('success', 'La tallas fue dada de Baja');
    }
}
