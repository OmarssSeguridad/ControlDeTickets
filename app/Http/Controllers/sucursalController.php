<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;


class sucursalController extends Controller
{
    public function create()
    {
        return view('admin.AltaSucursal'); 
    }
    public function store(Request $request)
    {
    	

        $sucursal = new Sucursal;   
        $sucursal->name = $request->name;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;
        $this->validate($request, [
        'name'=>'required',
        'direccion'=>'required',
        'telefono'=>'required',
        ]);
        $sucursal->save(); 
        return redirect('/admin/sucursales');
    }
    public function destroy($id)
    {
        $sucursal= Sucursal::find($id);
        $sucursal->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/sucursales');

        return $id;
    }
    //Buscar el departamendo del id
    public function edit($id)
    {

        $sucursal=Sucursal::find($id);
        return view('admin.editarSucursal',compact('sucursal'));
    }
    
    public function update(Request $request, $id)
    {
        $sucursal= Sucursal::find($id);
        $sucursal->name = $request->name;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;

        $this->validate($request, [
        'name'=>'required',
        'direccion'=>'required',
        'telefono'=>'required',
        ]);
        $sucursal->save(); 
  
        return redirect('/admin/editaSucursal/'.$id);

}

}
