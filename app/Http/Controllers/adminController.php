<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Admin;

class adminController extends Controller
{
    
    public function create()
    {
        return view('admin.AltaAdmin'); 
    }
    public function store(Request $request)
    {
    	

        $admin = new Admin;   

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->departamento = $request->departamento;
        $admin->cargo = $request->cargo;
        $admin->telefono = $request->telefono;
        $admin->direccion = $request->direccion;
        $admin->sucursal = $request->sucursal; 
        $admin->noEmpleado = $request->noEmpleado; 

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
        $admin->save(); 
        return redirect('/admin/dashboard');
    }
}
