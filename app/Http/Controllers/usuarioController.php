<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;


class usuarioController extends Controller
{
    public function create()
    {
        return view('admin.AltaUsuario'); 
    }
    public function store(Request $request)
    {
    	

        $usuario = new Usuario;   

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->departamento = $request->departamento;
        $usuario->cargo = $request->cargo;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->sucursal = $request->sucursal; 
        $usuario->noEmpleado = $request->noEmpleado; 

        $this->validate($request, [
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'departamento'=>'required',
        'cargo'=>'required',
         'telefono'=>'required',
        'direccion'=>'required',
        'sucursal'=>'required',
        'noEmpleado'=>'required',

        ]);

        $usuario->save(); 
        return redirect('/admin/dashboard');
    }
}
