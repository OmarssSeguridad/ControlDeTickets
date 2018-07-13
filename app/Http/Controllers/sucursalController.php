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
        return redirect('/admin/dashboard');
    }
}
