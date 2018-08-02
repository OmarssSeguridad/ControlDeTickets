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
                                            <input type="text" class="form-control" readonly="{{Auth::user()->name}}"  placeholder="name" name="name" value="{{ Auth::user()->name }}" >

                                        </div>
                                    </div>

                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sucursal</label>
                                            <input type="text" class="form-control" readonly="" placeholder="sucursal" name="sucursal" value="{{Auth::user()->sucursal}}">
                                        </div>
                                    </div>
                                    <div class="col-md-11 pr-1">
                                        <div class="form-group">
                                            <label>Asunto</label>
                                            <input type="text" class="form-control" placeholder="Asunto" name="asunto" readonly="" value="{{$tickets->asunto}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">
                                            <label>Detalle</label>
                                            <textarea type="text" rows="10" maxlength="255" name="detalle" id="detalle" value="detalle" readonly="" class="form-control">{{$tickets->detalle}} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-2 pl-1">
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
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Cambiar Status</button>
                                                </div>
                                                @endif
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                    <section id="respuestas">
                                        <section id="respuesta">
                                            @foreach($respuestas as $respuestas)
                                                <label>Usuario: {{$respuestas->idUsuario}} Creado: {{$respuestas->created_at}}</label>
                                                <label>Asunto: {{$respuestas->asunto}}</label>
                                                <br/>
                                                <label>Respuesta: {{$respuestas->detalle}}</label>
                                                <br/>
                                                
                                            @endforeach
                                        </section>
                                    </section>
                                        </div>
                                    </div>

                                    <div class="col-md-11 pl-1">
                                    <div class="form-group">
                                    <section>
                                        Respuesta
                                        <form action="/usuario/enviarRespuesta" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id"  value="{{ $tickets->id }}" >
                                            <input type="hidden"   name="name" value="{{Auth::user()->name }}" >
                                            <input type="hidden"   name="sucursal" value="{{$tickets->sucursal}}">
                                            <input type="hidden"  placeholder="Asunto" name="asunto" readonly="" value="{{$tickets->asunto}}">
                                            <textarea id="detalle" name="detalle" placeholder="Ingresar texto"rows="10" maxlength="255" class="form-control"></textarea>
                                            
                                             @if($tickets->status=="FINALIZADO")
                                                <h4>TICKET CERRADO {{$tickets->updated_at}} </h4>
                                            @else
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