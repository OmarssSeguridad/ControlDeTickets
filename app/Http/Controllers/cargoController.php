<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
class cargoController extends Controller
{
public function create()
    {
        return view('admin.altaCargo'); 
    }
    public function store(Request $request)
    {
        $cargo = new Cargo;   
        $cargo->name = $request->name;
        $this->validate($request, [
        'name'=>'required',
    ]);
        $cargo->save(); 
        return redirect('/admin/altaCargo');
    }

    public function edit($id)
    {
        $cargo=Cargo::find($id);
        if($cargo==null)
        {
            return view('errors.404');
        }
        return view('admin.editarCargo',compact('cargo'));
    }
    
    public function update(Cargo $id)
    {
        $cargo=request()->validate([
            'name'=>'required',
        ]); 
        $id->update($cargo);
  
        //dd($admin);
    return redirect('admin/cargos')->with('success', 'Registro modificado correctamente');

    }

    public function destroy($id)
    {
        $cargo= Cargo::find($id);
        if($cargo==null)
        {
            return view('errors.404');
        }
        $cargo->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/cargos');


    }    

}
