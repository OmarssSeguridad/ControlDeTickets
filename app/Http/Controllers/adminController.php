<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Departamento;
use App\Cargo;
use App\Sucursal;


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


    public function destroy($id)
    {
        $admin= Admin::find($id);
        $admin->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/administradores');


    }

    public function edit($id)
    {
        $admin=Admin::find($id);
        $departamento = Departamento::all();
        $cargo=Cargo::all();
        $sucursal=Sucursal::all();


        return view('admin.editarAdmin',compact('admin','departamento','cargo','sucursal'));
    }
    
    public function update(Admin $id)
    {
        /*$admin= Admin::find($id);
        $admin->name = $request->name;
        $admin->password = bcrypt($request->password);
        $admin->departamento = $request->departamento;
        $admin->cargo = $request->cargo;
        $admin->telefono = $request->telefono;
        $admin->direccion = $request->direccion;
        $admin->sucursal = $request->sucursal; 
        $admin->noEmpleado = $request->noEmpleado;*/

        $admin=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'departamento'=>'required',
            'cargo'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'password'=>'',
            'sucursal'=>'required',
            'noEmpleado'=>'required',
        ]); 



        if($admin['password']!=null){

         $admin['password']=bcrypt($admin['password']);
     }else{
      unset($admin['password']);
  } 


  $id->update($admin);
  
//dd($admin);
  return redirect()->route('admin.administradores')->with('success', 'Registro modificado correctamente');

}


}
