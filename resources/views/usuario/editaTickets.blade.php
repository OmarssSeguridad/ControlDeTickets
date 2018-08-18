@extends('usuario.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Folio</label>
                                            <input type="text" class="form-control" placeholder="idTicket" name="id" readonly="" value="{{old('id',$tickets->id)}}">
                                        </div>
                                    </div>

                                    <div class="col-md-5 px-1">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control" readonly=""  placeholder="name" name="name" value="{{old('name',$tickets->name)}}" >

                                        </div>
                                    </div>

                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sucursal</label>
                                            <input type="text" class="form-control" readonly="" placeholder="sucursal" name="sucursal" value="{{Auth::user()->sucursal}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Asunto</label>
                                            <input type="text" class="form-control" placeholder="Asunto" name="asunto" readonly="" value="{{$tickets->asunto}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-3">
                                        <div class="form-group">
                                            <label>Detalle</label>
                                            <textarea type="text" rows="10" maxlength="255" name="detalle" id="detalle" value="detalle" readonly="" class="form-control">{{$tickets->detalle}} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3 px-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                              <form method="POST" action="{{url("/admin/cambiarStatus/{$tickets->id}")}}">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                @if($tickets->status=="FINALIZADO")
                                                <select name="status"  class="form-control" placeholder="Selecciona">
                                                    @foreach($status as $status)
                                                    <option disabled="" {{ $selectedSta== $status->name ? 'selected="selected"' : '' }} >{{$status->name}}</option>
                                                    @endforeach
                                                </select>

                                                @else
                                                <select name="status"  class="form-control" placeholder="Selecciona">
                                                    @foreach($status as $status)
                                                    <option {{ $selectedSta== $status->name ? 'selected="selected"' : '' }} >{{$status->name}}</option>
                                                    @endforeach
                                                </select>

                                                @endif
                                            </form>

                                        </div>
                                    </div>

                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Evidencia</label></br>
                                             @if($tickets->evidencia==null)
                                             <label>No Hay Evidencia</label>
                                             @else
                                             <img src="/storage/{{$tickets->evidencia}}" >
                                             @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 px-3">
                                    <div class="form-group">
                                    <section id="respuestas">
                                        <section id="respuesta">
                                            @foreach($respuestas as $respuestas)
                                              <div class="panel panel-info class">
                                                    <div class="panel-heading">Usuario: {{$respuestas->idUsuario}} Creado: {{$respuestas->created_at}} 
                                                    </div>
                                                    <div class="panel-body">{{$respuestas->detalle}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </section>
                                    </section>
                                        </div>
                                    </div>

                                    <div class="col-md-11 px-3">
                                    <div class="form-group">
                                    <section>

                                        <form action="/usuario/enviarRespuesta" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id"  value="{{ $tickets->id }}" >
                                            <input type="hidden"   name="name" value="{{Auth::user()->name }}" >
                                            <input type="hidden"   name="sucursal" value="{{$tickets->sucursal}}">
                                            <input type="hidden"  placeholder="Asunto" name="asunto" readonly="" value="{{$tickets->asunto}}">
                                            
                                             @if($tickets->status=="FINALIZADO")
                                                <h3 align="center" style="color:RED">TICKET CERRADO {{$tickets->updated_at}} </h3>
                                            @else
                                             <label><p>Escriba una Respuesta</p></label>
                                            </br>
                                             <label><em>Para ayudarle mejor, le pedimos que sea especifico y detallado*</em></label>
                                            <textarea id="detalle" name="detalle" placeholder="Ingresar texto"rows="10" maxlength="255" class="form-control"></textarea>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Enviar Respuesta</button>
                                                
                                            @endif
                                         
                                        </form>
                                    </section>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection