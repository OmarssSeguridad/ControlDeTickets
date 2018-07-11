<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Admin;
use DB;
class perfilController extends Controller
{
    public function perfilAdministrador()
    {
		//$admin = Admin::find(Auth::id());        

       	return view('admin.perfil');
    }   
    public function mostrarAdministradores()
    {
		//$admin = Admin::find(Auth::id());        

        $admin = collect(DB::table('admins')->get());
        return view('admin.administradores',compact('admin'));
    }
    public function mostrarUsuarios()
    {
		//$admin = Admin::find(Auth::id());        

       	return view('admin.usuarios');
    }
        public function mostrarTickets()
    {
		//$admin = Admin::find(Auth::id());        

       	return view('admin.tickets');
    }

}
