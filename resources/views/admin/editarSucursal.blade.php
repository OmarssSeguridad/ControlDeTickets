@extends('admin.layout.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{'/admin/editarSucursal/'.$sucursal->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Control de Tickets">
                                </div>
                            </div>


                            <div class="col-md-3 px-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name',$sucursal->name) }}" autofocus >
                                    @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ old('direccion',$sucursal->direccion) }}">
                                    @if ($errors->has('direccion'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                    <label>Telefono</label>
                                    <input type="number" class="form-control" placeholder="(000)0000000" name="telefono" value="{{ old('telefono',$sucursal->telefono) }}">

                                    @if ($errors->has('telefono'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection