<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Admin;
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

       	return view('admin.administradores');
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
