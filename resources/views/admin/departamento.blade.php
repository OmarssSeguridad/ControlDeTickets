@extends('admin.layout.main')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Tabla de Departamento</h4>
                                    <p class="card-category">Departamento Activo</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </thead>
                                        @foreach ($departamento as $departamento) 
                                        <tbody>
                                            <tr>
                                                <td>{{ $departamento->id }}</td>
                                                <td>{{ $departamento->name }}</td>
                                                <td> 
                                                 <form action="{{'/admin/editaDepartamento/'.$departamento->id}}" method="PUT">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <button type="submit"class="btn btn-info btn-fill pull-right"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form action="{{'/admin/bajaDepartamento/'.$departamento->id}}" method="post"> 
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-fill pull-right"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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