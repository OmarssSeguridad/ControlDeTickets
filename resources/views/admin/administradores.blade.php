@extends('admin.layout.main')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-18">
                            <div class="card strpied-tabled-with-hover" >
                                <div class="card-header ">
                                    <h4 class="card-title">Tabla de Administradores</h4>
                                    <p class="card-category">Administradores Activos</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Departamento</th>
                                            <th>Cargo</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Sucursal</th>
                                            <th>No. Empleado</th>
                                            <th>Accion</th>
                                        </thead>
                                        @foreach ($admin as $admin) 
                                        <tbody>
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->departamento }}</td>
                                                <td>{{ $admin->cargo }}</td>
                                                <td>{{ $admin->telefono }}</td>
                                                <td>{{ $admin->direccion }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->sucursal }}</td>
                                                <td>{{ $admin->noEmpleado }}</td>
                                                <td> 
                                                <form action="{{'/admin/editaAdmin/'.$admin->id}}" method="PUT">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}

                                                    <button type="submit"class="btn btn-info btn-fill pull-right"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <!--<form href="{{ action('adminController@destroy',$admin->id)}}" method="post">-->
                                                <form action="{{'/admin/bajaAdmin/'.$admin->id}}" method="post"> 
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