<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class departamentoController extends Controller
{
    public function create()
    {
        return view('admin.AltaDepartamento'); 
    }
    public function store(Request $request)
    {
    	

        $departamento = new Departamento;   
        $departamento->name = $request->name;
        $this->validate($request, [
        'name'=>'required',
        ]);
        $departamento->save(); 
        return redirect('/admin/AltaDepartamento');
    }
    //Buscar el departamendo del id
    public function edit($id)
    {
        $departamento = Departamento::all();
        return view('admin.editarDepartamento',compact('departamento'));
    }
    
    public function update(Departamento $id)
    {


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

        if($admin['password']!=null)
        {
         $admin['password']=bcrypt($admin['password']);
        }else
        {
            unset($admin['password']);
        } 


  $id->update($admin);
  
//dd($admin);
  return redirect('admin/Departamentos')->with('success', 'Registro modificado correctamente');

}
}
