@extends('usuario.layout.main')
@section('content')
    

<div class="container-fluid">
    <div class="row">
        <h4><font color="Blue" face="Arial"><b>¡Bienvenido a iTicket!</b></font></h4>   
            <font color="Black" face="Arial" style='text-align: justify'>
                <b>
                Con el fin de agilizar las solicitudes de soporte y tener un mejor servicio utilizamos un control de Tickets de soporte.
            
                Cada solicitud de soporte se le acciona un número de Ticket único que se puede utilizar para rastrear el progreso y respuestas en línea. Para su referencia proporcionamos archivos completos y la historia de todas sus peticiones de ayuda. Por lo que es necesario una dirección de correo electrónico válida para poder presentar Tickets.
                </b>
            </font>
    </div>
</div>
            



@endsection
@section('content2')
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>


@endsection