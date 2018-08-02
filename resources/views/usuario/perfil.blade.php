@extends('usuario.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mi Perfil</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Hensa Distribuciones S.A. de C.V.">
                                                </div>
                                            </div>


                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Username" name="name" value="{{Auth::user()->name}}" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Correo Electronico</label>
                                                    <input type="email" disabled="" class="form-control" placeholder="Email" name="correo" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Departamento</label>
                                                    <input type="text" class="form-control" placeholder="Departamento" name="departamento" value="{{Auth::user()->departamento}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Cargo</label>
                                                    <input type="text" class="form-control" placeholder="Cargo" name="cargo" value="{{Auth::user()->cargo}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{Auth::user()->direccion}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Sucursal</label>
                                                    <input type="text" class="form-control" placeholder="Sucursal" name="sucursal" value="{{Auth::user()->sucursal}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>No. Empleado</label>
                                                    <input type="number" disabled="" class="form-control" placeholder="0000" name="noEmpleado" value="{{Auth::user()->noEmpleado}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="number" class="form-control" placeholder="(000)0000000" name="telefono" value="{{Auth::user()->telefono}}">
                                                </div>
                                            </div>
                                        </div>

                                      <!--  <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Perfil</button>
                                        <div class="clearfix"></div>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="{{ asset('/img/faces/face-3.jpg') }}" alt="...">
                                            <h5 class="title">{{Auth::user()->name}}</h5>
                                        </a>
                                    </div>
                                    <p class="description text-center">
                                        <br> {{Auth::user()->email}}
                                        <br> {{Auth::user()->departamento}}
                                        <br> {{Auth::user()->cargo}}
                                        <br> {{Auth::user()->sucursal}}
                                        <br> {{Auth::user()->noEmpleado}}
                                        <br> {{Auth::user()->departamento}}
                                        <br> {{Auth::user()->telefono}}
                                    </p>
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
  

@endsection