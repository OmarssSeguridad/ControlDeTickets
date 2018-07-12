<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Admin;
use DB;
class perfilController extends Controller
{
    public function perfilAdministrador()
    {
       	return view('admin.perfil');
    }   

    public function mostrarAdministradores()
    {
        $admin = collect(DB::table('admins')->get());
        return view('admin.administradores',compact('admin'));
    }

    public function mostrarUsuarios()
    {
        $usuario = collect(DB::table('usuarios')->get());
        return view('admin.usuarios',compact('usuario'));
    }

    public function mostrarTickets()
    {
		//$admin = Admin::find(Auth::id());        

       	return view('admin.tickets');
    }
    public function mostrarSucursales()
    {
        $sucursal = collect(DB::table('sucursals')->get());
        return view('admin.sucursales',compact('sucursal'));
    }
}
