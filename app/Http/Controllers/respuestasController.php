<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuestas;

class respuestasController extends Controller
{

    public function store(Request $request)
	{
	    $respuestas = new Respuestas;   
	   	$respuestas->idTicket = $request->id;
	    $respuestas->asunto = $request->asunto;
	    $respuestas->detalle = $request->detalle;
	    $respuestas->idUsuario = $request->name;

	    $this->validate($request, [
	        'detalle'=>'required',

	    ]);
	    $respuestas->save();
	    return redirect('/admin/editaTicket/'.$respuestas->idTicket);
	}
}
