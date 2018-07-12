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
        $departamento->save(); 
        return redirect('/admin/dashboard');
    }
}
