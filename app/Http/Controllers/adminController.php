<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Usuario;
use App\Departamento;
use App\Cargo;
use App\Sucursal;
use DB;

class adminController extends Controller
{

    public function create()
    {
        //return view('admin.AltaAdmin'); 
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
            'name'=>'required|max:30',
            'email'=>'required',
            'password'=>'required|min:6|max:30',
            'departamento'=>'required',
            'cargo'=>'required',
            'telefono'=>'required|max:10',
            'direccion'=>'required|max:100',
            'sucursal'=>'required',
            'noEmpleado'=>'required|max:5',

        ]);
        $admin->save(); 
        return redirect('/admin/administradores');
    }


    public function destroy($id)
    {
        $admin= Admin::find($id);
        if($admin==null)
        {
            return view('errors.404');
        }
        $admin->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/administradores');


    }
//Buscar el departamendo del id
    public function edit($id)
    {
        $admin=Admin::find($id);
        if($admin==null)
        {
            return view('errors.404');
        }
        $departamento = Departamento::all();
        $cargo=Cargo::all();
        $sucursal=Sucursal::all();
        $selectedDep =Admin::find($id)->departamento;
        $selectedCar =Admin::find($id)->cargo;
        $selectedSuc =Admin::find($id)->sucursal;
        return view('admin.editarAdmin',compact('admin','departamento','cargo','sucursal','selectedDep','selectedCar','selectedSuc'));
    }
    
    public function update(Admin $id)
    {   
        
        $admin=request()->validate([
            'name'=>'required|max:30',
            'email'=>'required',
            'password'=>'required|min:6|max:30',
            'departamento'=>'required',
            'cargo'=>'required',
            'telefono'=>'required|max:10',
            'direccion'=>'required|max:100',
            'sucursal'=>'required',
            'noEmpleado'=>'required|max:5',
        ]); 



        if($admin['password']!=null)
        {

         $admin['password']=bcrypt($admin['password']);
        }else
        {
            unset($admin['password']);
        } 


  $id->update($admin);
  
//dd($admin);
  return redirect('admin/administradores')->with('success', 'Registro modificado correctamente');

}


}
