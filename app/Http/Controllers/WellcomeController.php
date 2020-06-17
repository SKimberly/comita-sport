<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('id','DESC')->get();
    	return view('welcome', compact('categorias'));
    }
    public function show($slug)
    {
        $categoria = Categoria::where('slug', $slug)->first();
    	//dd($categoria);
        $productos = Producto::where('categoria_id',$categoria->id)->orderBy('id','DESC')->get();

        //dd($productos);
        return view('productos',compact('productos'));
    }
}
