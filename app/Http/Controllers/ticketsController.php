<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use App\Usuario;
use App\Status;
use App\Respuestas;
use DB;

class ticketsController extends Controller
{
public function create()
{
    $tic = DB::table('tickets')->select('id')->max('id');
    return view('admin.AltaTicket',compact('tic')); 
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
    return redirect('/admin/tickets');
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
      //  $respuestas = collect(DB::table('respuestas')->select('idTicket','idUsuario','detalle','created_at')->where($id));
         $tickets=Tickets::find($id);
        $status= Status::all();
        $selectedSta = Tickets::find($id)->status;
        $respuestas = Respuestas::where('idTicket','=',$id)->get();
        
        return view('admin.editaTickets',compact('tickets','status','selectedSta','respuestas'));
    }
    
    public function update(Admin $id)
    {

        $tickets=request()->validate([
        'asunto'=>'required',
        'detalle'=>'required',
        'Status' =>'required',
        ]); 

  $id->update($tickets);
  
  return redirect('admin/tickets')->with('success', 'Registro modificado correctamente');

}

public function modificaStatus(Request $request, $id){

      $tickets = Tickets::find($id);   
   
    $tickets->status = $request->status;

   
     $tickets->save(); 
    return redirect('/admin/editaTicket/'.$id)->with('success', 'Registro modificado correctamente');
    }



}
