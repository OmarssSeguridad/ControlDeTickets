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
        'name'=>'required|max:50',
        ]);
        $departamento->save(); 
        return redirect('/admin/altaDepartamento');
    }
    //Buscar el departamendo del id
    public function edit($id)
    {
        $departamento=Departamento::find($id);
        if($departamento==null)
        {
            return view('errors.404');
        }
        return view('admin.editarDepartamento',compact('departamento'));
    }
    
    public function update(Departamento $id)
    {
        $departamento=request()->validate([
            'name'=>'required',
        ]); 
        $id->update($departamento);
  
//dd($admin);
  return redirect('admin/departamentos')->with('success', 'Registro modificado correctamente');

    }
    public function destroy($id)
    {
        $departamento= Departamento::find($id);
        if($departamento==null)
        {
            return view('errors.404');
        }
        $departamento->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/departamentos');


    }    
}
