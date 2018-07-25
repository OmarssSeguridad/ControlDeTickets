@extends('admin.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrar Ticket</h4>
                    </div>


                    @if($errors-> any())
                    <div class="alert alert-danger">
                        <h6>Por favor corrige los errores debajo:</h6>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <div class="card-body">
                        <form role="form" method="PUT" action="{{ url("/admin/editarTickets/{$tickets->id}")}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>Folio</label>
                                        <input type="text" class="form-control" disabled="folio" placeholder="" value="{{$tickets->id}}" >
                                </div>
                            </div>


                            <div class="col-md-5 px-1">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" readonly=""  placeholder="name" name="name" value="{{$tickets->name}}" >

                                </div>
                            </div>

                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sucursal</label>
                                    <input type="text" class="form-control" readonly="" placeholder="sucursal" name="sucursal" value="{{$tickets->sucursal}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Asunto</label>
                                <input type="text" class="form-control" placeholder="Asunto" name="asunto" value="{{old('asunto',$tickets->asunto)}}">
                            </div>
                        </div>


                        <div class="col-md-12 pl-1">
                            <div class="form-group">
                                <label>Detalle</label>
                                <textarea type="text" rows="10" maxlength="255" name="detalle" id="detalle" value="{{old('detalle')}}" class="form-control"> {{$tickets->detalle}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-3 pl-1">
                            <div class="form-group">
                                <label>Evidencia</label>
                                <input type="file" class="form-control-file" value="{{old('evidencia')}}" name="{{old('asunto',$tickets->evidencia)}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3 pl-1 ">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text"  id="Status"  readonly=""  value="Pendiente" name="status" class="form-control ">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection