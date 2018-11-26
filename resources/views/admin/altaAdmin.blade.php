@extends('admin.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrar Administrador</h4>
                                </div>
                                <div class="card-body">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/altaAdmin') }}">
                                {{ csrf_field() }}
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
                                                    <input type="text" class="form-control" placeholder="Username" maxlength="50" name="name" value="{{ old('name') }}" autofocus >
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email">Correo Electronico</label>
                                                    <input type="email" maxlength="50" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                                                <label>Departamento</label>
                                                <select name="departamento" class="form-control" placeholder="Seleciona">
                                                    @foreach($departamento as $departamento)
                                                    <option>{{$departamento->name}}</option>
                                                    @endforeach
                                                </select>
                                @if ($errors->has('departamento'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('departamento') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                                <label>Cargo</label>
                                                <select name="cargo" class="form-control" placeholder="Seleciona">
                                                    @foreach($cargo as $cargo)
                                                    <option>{{$cargo->name}}</option>
                                                    @endforeach
                                                </select>

                                @if ($errors->has('cargo'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                                    <label>Direccion</label>
                                                    <input type="text" class="form-control" placeholder="Direccion" maxlength="100"  name="direccion" value="{{ old('direccion') }}">
                                @if ($errors->has('direccion'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group{{ $errors->has('sucursal') ? ' has-error' : '' }}">
                                                <label>Sucursal</label>
                                                <select name="sucursal" class="form-control" placeholder="Seleciona">
                                                    @foreach($sucursal as $sucursal)
                                                    <option>{{$sucursal->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('sucursal'))
                                                    <span class="alert alert-danger">
                                                        <strong>{{ $errors->first('sucursal') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group{{ $errors->has('noEmpleado') ? ' has-error' : '' }}">
                                                    <label>No. Empleado</label>
                                                    <input type="number" class="form-control" placeholder="0000" min="0" maxlength="5" name="noEmpleado" value="{{ old('noEmpleado') }}">
                               @if ($errors->has('noEmpleado'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('noEmpleado') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-2">
                                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                                    <label>Telefono</label>
                                                    <input type="number" min="0" maxlength="5" class="form-control" placeholder="(000)0000000" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-3">
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">

                                                    @if ($errors->has('password'))
                                                        <span class="alert alert-danger">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-0">
                                                <div id="password-confirmation" class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label>Confirmar Password</label>
                                                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="alert alert-danger">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear Administrador</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection