@extends('admin.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrar Cargo</h4>
                                </div>
                                <div class="card-body">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/altaCargo') }}">
                                {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6 pr-4">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Hensa Distribuciones S.A. de C.V.">
                                                </div>
                                            </div>


                                            <div class="col-md-6 px-6">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Cargo</label>
                                                    <input type="text" class="form-control" placeholder="Gerente" name="name" value="{{ old('name') }}" autofocus >
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear Cargo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection