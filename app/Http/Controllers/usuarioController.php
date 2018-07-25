<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Departamento;
use App\Cargo;
use App\Sucursal;



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
    public function destroy($id)
    {
        $usuario= Usuario::find($id);
        $usuario->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/usuarios');

    }
    public function edit($id)
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

        $usuario=Usuario::find($id);
        $departamento = Departamento::all();
        $cargo=Cargo::all();
        $sucursal=Sucursal::all();
        $selectedDep =Usuario::find($id)->departamento;
        $selectedCar =Usuario::find($id)->cargo;
        $selectedSuc =Usuario::find($id)->sucursal;
        return view('admin.editarUsuario',compact('usuario','departamento','cargo','sucursal','selectedDep','selectedCar','selectedSuc'));
    }
    
    public function update(Admin $id)
    {

        $usuario=request()->validate([
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

        if($usuario['password']!=null)
        {
            $usuario['password']=bcrypt($usuario['password']);
        }else
        {
            unset($usuario['password']);
        } 
        $id->update($usuario);
        return redirect('admin/administradores')->with('success', 'Registro modificado correctamente');

    }
}
