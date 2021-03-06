@extends('admin.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrar Sucursal</h4>
                                </div>


                                <div class="card-body">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/altaSucursal') }}">
                                {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6 pr-4">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Control de Tickets">
                                                </div>
                                            </div>


                                        <div class="col-md-6 px-6">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Username" maxlength="50" name="name" value="{{ old('name') }}" autofocus >
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                                    <label>Direccion</label>
                                                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" maxlength="100" value="{{ old('direccion') }}">
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
                                                    <input type="number" min="0" pattern="\d+" class="form-control" placeholder="(000)0000000" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear Sucursal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection