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
                        <form class="form-horizontal" role="form" method="POST" action="{{'/admin/editarCargo/'.$cargo->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Hensa Distribuciones S.A. de C.V.">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name',$cargo->name) }}" autofocus >
                                    @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
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