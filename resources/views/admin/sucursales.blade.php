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
                                                <form action="" method="post">
                                                    {{ csrf_field() }}
                                                    <!--{{ method_field('PUT') }}-->
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
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="">Hensa Distribuciones</a>, Hecho con ❤️ 
                        </p>
                    </nav>
                </div>

            </footer>
@endsection('content')