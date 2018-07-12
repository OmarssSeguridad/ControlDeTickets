<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;

class ticketsController extends Controller
{
   public function create()
    {
        return view('admin.AltaTicket'); 
    }
    public function store(Request $request)
    {
    	

        $tickets = new Tickets;   
        $tickets->name = $request->name;
        $tickets->sucursal = $request->sucursal;
        $tickets->asunto = $request->asunto;
        $tickets->detalle = $request->detalle;
        $tickets->status = $request->status;
        $tickets->evidencia = $request->evidencia;
        $tickets->save(); 
        return redirect('/admin/dashboard');
    }
}
