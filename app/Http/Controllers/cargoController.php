<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
class cargoController extends Controller
{
public function create()
    {
        return view('admin.AltaCargo'); 
    }
    public function store(Request $request)
    {
        $cargo = new Cargo;   
        $cargo->name = $request->name;
        $this->validate($request, [
        'name'=>'required',
    ]);
        $cargo->save(); 
        return redirect('/admin/dashboard');
    }
}
