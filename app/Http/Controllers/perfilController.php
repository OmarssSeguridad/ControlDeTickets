<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sucursal;
use App\Cargo;
use App\Departamento;
use App\Status;
use App\Respuestas;
use App\Tickets;
use Auth;
use View;
use DB;
class perfilController extends Controller
{
    public function perfilAdministrador()
    {
       	return view('admin.perfil');
    }   
    public function perfilUsuario()
    {
        return view('usuario.perfil');
    }   
    public function contenidoDashboard(){        
                
        $contadorDeAdmins = collect(DB::table('admins')->get())->count();
        $contadorUsuarios = collect(DB::table('usuarios')->get())->count();
        $actualizacionAdmins = collect(DB::table('admins')->select('created_at')->max('created_at'));
        $actualizacionUsuarios = collect(DB::table('usuarios')->select('created_at')->max('created_at'));
        return view('admin.dashboard',compact('contadorDeAdmins','actualizacionAdmins','actualizacionUsuarios','contadorUsuarios'));
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
        $ticket = collect(DB::table('tickets')->get());
        $status = Status::all();
        return view('admin.tickets',compact('ticket','status'));


    }
    public function mostrarTicketsUsuario()
    {
        //$ticket = collect(DB::table('tickets')->get());
        $user = Auth::user()->name;
        $ticket = Tickets::where('name','=',$user)->get();
        $status = Status::all();

        return view('usuario.tickets',compact('ticket','status'));


    }
    public function mostrarSucursales()
    {
        $sucursal = collect(DB::table('sucursals')->get());
        return view('admin.sucursales',compact('sucursal'));
    }
    public function mostrarCargos()
    {
        $cargo = collect(DB::table('cargos')->get());
        return view('admin.cargo',compact('cargo'));
    }
    public function mostrarDepartamentos()
    {
        $departamento = collect(DB::table('departamentos')->get());
        return view('admin.departamento',compact('departamento'));
    }


    //COMBOBOX
    public function combo()
    {
        $sucursal = Sucursal::all();
         $cargo = Cargo::all();
        $departamento = Departamento::all();
        return view('admin.altaAdmin', compact('sucursal','cargo','departamento'));
    }
    public function comboUsuario()
    {
        $sucursal = Sucursal::all();
         $cargo = Cargo::all();
        $departamento = Departamento::all();
        return view('admin.altaUsuario', compact('sucursal','cargo','departamento'));
    }
     public function comboEdita()
    {
        $sucursal = Sucursal::all();
        $cargo = Cargo::all();
        $departamento = Departamento::all();
        return view('admin.editaAdmin', compact('sucursal','cargo','departamento'));
    }

}
