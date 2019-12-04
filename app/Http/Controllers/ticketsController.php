<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Tickets;
use App\Usuario;
use App\Status;
use App\Respuestas;
use DB;
use Mail;
use Auth;

class ticketsController extends Controller
{
public function create()
{
    $tic = DB::table('tickets')->select('id')->max('id');
    return view('admin.altaTicket',compact('tic')); 
}
public function createUsuario()
{
    $tic = DB::table('tickets')->select('id')->max('id');
    return view('usuario.altaTicket',compact('tic')); 
}

public function store(Request $request)
{
    $tickets = new Tickets;   
    $tickets->name = $request->name;
    $tickets->email = Auth::user()->email;//
    $tickets->sucursal = $request->sucursal;
    $tickets->asunto = $request->asunto;
    $tickets->detalle = $request->detalle;
    $tickets->status = $request->status;
    if($request->evidencia != null)
    {
        $file = $request->file('evidencia');
        //obtenemos el nombre del archivo
        $nombre = "HD".$request->folio;
        $tickets->evidencia = $nombre;
           //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));    
    }
    $this->validate($request, [
        'asunto'=>'required',
        'detalle'=>'required',

    ]);
     $tickets->save(); 
     //colocar esto en [  ] del codigo de abajo
    $name = $request->name;
    $email = Auth::user()->email;
    $folio = $request->folio;
    $sucursal = $request->sucursal;
    $asunto = $request->asunto;
    $detalle = $request->detalle;
    $status = $request->status;
    Mail::send('emails.altaTicket', [
            'name'=> $name,
            'folio'=>$folio,
            'sucursal'=>$sucursal,
            'asunto' =>$asunto,
            'detalle'=>$detalle,
            'status'=>$status

        ], function(Message $message)use($request){
        $message->to('omar.blanco@8w.com.mx','Sistemas')
        ->subject($request->asunto);
    });

    return redirect('/admin/tickets');
}
public function storeUsuario(Request $request)
{

    $tickets = new Tickets;   
    $tickets->name = $request->name;
    $tickets->email = Auth::user()->email;//
    $tickets->sucursal = $request->sucursal;
    $tickets->asunto = $request->asunto;
    $tickets->detalle = $request->detalle;
    $tickets->status = $request->status;
    if($request->evidencia != null)
    {
        $file = $request->file('evidencia');
        //obtenemos el nombre del archivo
        $nombre = "HD".$request->folio;
        $tickets->evidencia = $nombre;
           //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
    }         
    
    $this->validate($request, [
        'asunto'=>'required',
        'detalle'=>'required',
    ]);
    $name = $request->name;
    $email = Auth::user()->email;
    $folio = $request->folio;
    $sucursal = $request->sucursal;
    $asunto = $request->asunto;
    $detalle = $request->detalle;
    $status = $request->status;
    Mail::send('emails.altaTicket', [
            'name'=> $name,
            'folio'=>$folio,
            'sucursal'=>$sucursal,
            'asunto' =>$asunto,
            'detalle'=>$detalle,
            'status'=>$status

        ], function(Message $message)use($request){
        $message->to('omar.blanco@8w.com.mx','Sistemas')
        ->subject($request->asunto);
    });
     $tickets->save(); 
    return redirect('/usuario/tickets');
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
         if($tickets==null)
         {
            return view('errors.404');
         }
        $status= Status::all();
        $selectedSta = Tickets::find($id)->status;
        $respuestas = Respuestas::where('idTicket','=',$id)->get();
        
        return view('admin.editaTickets',compact('tickets','status','selectedSta','respuestas'));
    }
    public function editUsuario($id)
    {
        $tickets=Tickets::find($id);
        if($tickets==null)
        {
            return view('errors.404');
        }
        $status= Status::all();
        $selectedSta = Tickets::find($id)->status;
        $respuestas = Respuestas::where('idTicket','=',$id)->get();
        
        return view('usuario.editaTickets',compact('tickets','status','selectedSta','respuestas'));
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
    if($tickets==null)
    {
        return view('errors.404');
    }
    $tickets->status = $request->status;
   
    if($request->status==='FINALIZADO')
    {
        $name = $tickets->name;
        $folio = $id;
        $email = $tickets->email;
        $sucursal = $tickets->sucursal;
        $asunto = $tickets->asunto;
        $detalle = $tickets->detalle;
        $status = $tickets->status;
        Mail::send('emails.ticketFinalizado', [
            'name'=> $name,
            'folio'=>$folio,
            'sucursal'=>$sucursal,
            'asunto' =>$asunto,
            'detalle'=>$detalle,
            'status'=>$status

        ], function(Message $message)use($request, $tickets){
        $message->to($tickets->email,'Sistemas')
        ->subject($tickets->asunto);
        });
    }
     $tickets->save(); 
    return redirect('/admin/editaTicket/'.$id)->with('success', 'Registro modificado correctamente');
    }



}
