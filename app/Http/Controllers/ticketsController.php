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
   

    $this->validate($request, [
        'asunto'=>'required',
        'detalle'=>'required',

    ]);
     $tickets->save(); 
    return redirect('/admin/dashboard');
}
    public function destroy($id)
    {
        $admin= Tickets::find($id);
        $admin->delete();
        session()->flash('message','Eliminado Correctamente');
        return redirect('admin/tickets');
    }
    public function combo()
    {
        $cargo = Status::all();
        return view('admin.tickets', compact('status'));
    }


    public function edit($id)
    {
        $tickets=Tickets::find($id);
        return view('admin.editaTickets',compact('tickets'));
    }
    
    public function update(Admin $id)
    {

        $tickets=request()->validate([
        'asunto'=>'required',
        'detalle'=>'required',
        ]); 

  $id->update($tickets);
  
  return redirect('admin/tickets')->with('success', 'Registro modificado correctamente');

}



}
