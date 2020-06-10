<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index(){
    	$categorias = Categoria::orderBy('id','DESC')->get();
        $productos = Producto::where('estado', true)->orderBy('id','DESC')->get();
        return view('home', compact('categorias', 'productos'));
    }

}