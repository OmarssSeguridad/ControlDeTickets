@extends('admin.layout.main')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Tabla de Sucursales</h4>
                                    <p class="card-category">Sucursales Activas</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Accion</th>
                                        </thead>
                                        @foreach ($sucursal as $sucursal) 
                                        <tbody>
                                            <tr>
                                                <td>{{ $sucursal->id }}</td>
                                                <td>{{ $sucursal->name }}</td>
                                                <td>{{ $sucursal->direccion }}</td>
                                                <td>{{ $sucursal->telefono }}</td>
                                                <td> 
                                                 <form action="{{'/admin/editaSucursal/'.$sucursal->id}}" method="PUT">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <button type="submit"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form action="{{'/admin/bajaSucursal/'.$sucursal->id}}" method="post"> 
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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