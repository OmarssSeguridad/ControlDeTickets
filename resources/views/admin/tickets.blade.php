@extends('admin.layout.main')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Tabla de Tickets</h4>
                                    <p class="card-category">Tickets</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Sucursal</th>
                                            <th>Asunto</th>
                                            <th>Status</th>
                                            <th>Accion</th>
                                        </thead>
                                        @foreach ($ticket as $ticket) 
                                        <tbody>
                                            <tr>
                                                <td>{{ $ticket->id }}</td>
                                                <td>{{ $ticket->name }}</td>
                                                <td>{{ $ticket->sucursal }}</td>
                                                <td>{{ $ticket->asunto }}</td>
                                              
                                                <td>
                                                    @if($ticket->status=="ALTA")
                                                        <form action="{{'/admin/editaTicket/'.$ticket->id}}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button type="submit" style='width:130px'  class="btn btn-danger btn-fill pull-right">{{ $ticket->status }}</button>
                                                        </form>
                                                    @endif
                                                    @if($ticket->status=="PROCESO")
                                                        <form action="{{'/admin/editaTicket/'.$ticket->id}}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button type="submit" style='width:130px' width=10  class="btn btn-warning btn-fill pull-right">{{ $ticket->status }}</button>
                                                        </form>
                                                    @endif
                                                    @if($ticket->status=="FINALIZADO")
                                                        <form action="{{'/admin/editaTicket/'.$ticket->id}}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button type="submit" style='width:130px' width=10  class="btn btn-success btn-fill pull-right">{{ $ticket->status }}</button>
                                                        </form>
                                                    @endif
                                                
                                                    <td>
                                                <form action="{{'/admin/bajaTicket/'.$ticket->id}}" method="post"> 
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button  type="submit"class="btn btn-danger btn-fill pull-right"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                                </form> 
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection('content')