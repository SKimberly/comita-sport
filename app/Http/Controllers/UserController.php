<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCrearRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->tipo === 'Super-Admin' ){
            $users = User::where('id','!=',auth()->user()->id)->where('activo', true)->orderBy('id', 'DESC')->paginate();
        }
        if( auth()->user()->tipo === 'Administrador'){
            $users = User::where('id','!=',auth()->user()->id)->where('tipo','!=','Super-Admin')->where('activo', true)->orderBy('id', 'DESC')->paginate();
        }
        if( auth()->user()->tipo === 'Ventas'){
            $users = User::where('id','!=',auth()->user()->id)->where('tipo','!=','Administrador')->where('tipo','!=','Super-Admin')->where('activo', true)->orderBy('id', 'DESC')->paginate();
        }

        //dd(User::paginate(10));


        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $slug)
    {
        $this->validate($request, [
            'telefono' => 'required|min:5|max:12'
        ]);

        $user = User::where('slug',$slug)->first();
        $user->email = $request['email'];
        $user->telefono = $request['telefono'];

        if(!empty($request->password))
        {
            $this->validate($request, [
                'password' => 'min:5'
            ]);
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        Alert::success('¡Excelente!', 'Actualizaste tu perfil');
        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCrearRequest $request)
    {
        //Estoy validando con el archi UserGuardarRequest
        if(!empty($request['email'])){
            $this->validate($request, [
                'email' => 'unique:users,email',
            ]);
        }
        $user = new User;
        $user->fullname = $request['fullname'];
        $user->slug = Str::of($request['fullname'])->slug('-');
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->tipo = $request->rol;
        $user->save();
        return redirect('/admin/users#')->with('success', 'Usuario registrado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //dd($slug);
        $user = User::where('slug',$slug)->first();
        //dd($user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //dd($slug);
        $user = User::where('slug', $slug)->first();
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserCrearRequest $request, $slug)
    {
        //dd($slug);
        $user = User::where('slug', $slug)->first();
        $user->fullname = $request['fullname'];
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        $user->tipo = $request['rol'];
        if(!empty($request['password']))
        {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        return redirect('admin/users')->with('success', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->update(['activo'=>false]);
        return redirect('admin/users')->with('success', 'El Usuario fue dado de baja');
    }
}
