@extends('admin.layout.main')
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrar Departamento</h4>
                                </div>
                                <div class="card-body">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/altaDepartamento') }}">
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
                                                    <label>Departamento</label>
                                                    <input type="text" class="form-control" placeholder="Sistemas" name="name" value="{{ old('name') }}" autofocus >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear Departamento</button>
                                    </form>
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