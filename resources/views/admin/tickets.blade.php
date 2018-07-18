@extends('admin.layout.main')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Tabla de Tickets</h4>
                                    <p class="card-category">Tickets</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Sucursal</th>
                                            <th>Asunto</th>
                                            <th>Detalle</th>
                                            <th>Status</th>
                                            <th>Evidencia</th>
                                            <th>Accion</th>
                                        </thead>
                                        @foreach ($ticket as $ticket) 
                                        <tbody>
                                            <tr>
                                                <td>{{ $ticket->id }}</td>
                                                <td>{{ $ticket->name }}</td>
                                                <td>{{ $ticket->sucursal }}</td>
                                                <td>{{ $ticket->asunto }}</td>
                                                <td>{{ $ticket->detalle }}</td>
                                                <td>
                                                <form method="POST" action="">
                                                    <div class="btn-group">  
                                                    <div class="col-md-9">                      
                                                     <select name="status" class="form-control"> 
                                                        @foreach($status as $status)
                                                        <option>{{$status->name}}</option>
                                                        @endforeach                                    
                                                    </select> 
                                                  </div>
                                                  </div>
                                                </form>

                                                </td>
                                                <td>{{ $ticket->evidencia }}</td>    
                                                <td> 
                                                <form action="" method="post">
                                                    {{ csrf_field() }}
                                                    <!--{{ method_field('PUT') }}-->
                                                    <button type="submit"><i class="fa fa-edit"></i></button>
                                                </form>
                                               
                                                <form action="{{'/admin/bajaTicket/'.$ticket->id}}" method="post"> 
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