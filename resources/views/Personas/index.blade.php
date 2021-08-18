@extends('adminlte::page')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">


<div class="card">
    <div class="card-body">
        <table class="table table-dark " id="list-Roles">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                <tr>
                    <td> <img src="/storage/{{$persona['imagen']}}" width="35" height="35" class="img-fluid  mx-auto d-block  "></td>
                    <td>{{$persona['name']}}</td>
                    <td>{{$persona['last_name']}}</td>
                    <td>
                        @if($persona['estado'] === 1)
                        <span class=" badge badge-success">Activo</span>
                        @else

                        <span class=" badge badge-danger">Inactivo</span>

                        @endif
                    </td>
                    <td>

                        @if(auth()->user()->can('DELETE USER'))
                        <a type="button" class="btn btn-danger">Eliminar</a>
                        @endif
                        @if(auth()->user()->can('DELETE VENTA'))
                        <a href={{ "personas/".$persona['id'].'/edit'}} type="button" class="btn btn-primary">Actualizar</a>
                        @endif
                        @if(auth()->user()->can('VIEW USER'))
                        <a href={{ "personas/".$persona['id']}} type="button" class="btn btn-secondary">Ver</a>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


</div>

<script script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
    $('#list-Roles').DataTable({
        responsive: "true",
        dom: "Bfrtilp",
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="far fa-file-excel"></i>',
                titleAttr: 'Excel',
                className: 'btn btn-success'
            }

        ]


    });
</script>
@endsection