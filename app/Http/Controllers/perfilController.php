<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sucursal;
use App\Cargo;
use App\Departamento;
use App\Status;
use App\Respuestas;
use App\Tickets;
use View;
use DB;
class perfilController extends Controller
{
    public function perfilAdministrador()
    {
       	return view('admin.perfil');
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
    public function mostrarSucursales()
    {
        $sucursal = collect(DB::table('sucursals')->get());
        return view('admin.sucursales',compact('sucursal'));
    }
    public function mostrarRespuestas($id)
    {

        //$respuestas = Respuestas::all()->get('idTicket',$id);
        $tickets=Tickets::find($id);
        $status= Status::all();
        $selectedSta = Tickets::find($id)->status;
        $respuestas = Respuestas::where('idTicket','=',$id)->get();
        
        return view('admin.editaTickets',compact('tickets','status','selectedSta','respuestas'));
        //return View::make('admin.editaTickets',compact('tickets','status','selectedSta'))->with('respuestas',$respuestas);
    }
    //COMBOBOX
    public function combo()
    {
        $sucursal = Sucursal::all();
        $cargo = Cargo::all();
        $departamento = Departamento::all();
        return view('admin.altaAdmin', compact('sucursal','cargo','departamento'));
    }
     public function comboEdita()
    {
        $sucursal = Sucursal::all();
        $cargo = Cargo::all();
        $departamento = Departamento::all();
        return view('admin.editaAdmin', compact('sucursal','cargo','departamento'));
    }

}
