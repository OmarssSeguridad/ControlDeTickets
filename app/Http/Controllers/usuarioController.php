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
        return view('admin.altaUsuario'); 
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

        $usuario->save(); 
        return redirect('/admin/usuarios');
    }
    public function destroy($id)
    {
        $usuario= Usuario::find($id);
        if($usuario==null)
        {
            return view('errors.404');
        }
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
        if($usuario==null)
        {
            return view('errors.404');
        }
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
