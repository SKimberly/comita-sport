<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth')->except(['store']);
    }
    public function index(){
    	$categorias = Categoria::orderBy('id','DESC')->get();
        $productos = Producto::where('estado', true)->orderBy('id','DESC')->get();
        return view('home', compact('categorias', 'productos'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'required',
            'contenido' => 'required'
        ]);

        $deEmail = $request->email;
        $deNombre = $request->nombre;
        Mail::send('emails.contacto',$request->all(), function($msj) use($deEmail,$deNombre){
            $msj->cc($deEmail);
            $msj->from($deEmail, $deNombre );
            $msj->subject('Mensaje recibido desde el contacto del sitio web Sport La Comita');
            $msj->to('sport.lacomita19@gmail.com');
        });

        return redirect('/#contacto')->with('success', 'Mensaje enviado correctamente... Se te enviará la respuesta a tu correo o celular!');
    }

}