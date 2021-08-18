@extends('adminlte::page')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<div class="card">
    <div class="card-body">
        <table class="table table-dark " id="list-user">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Servicio</th>
                    <th>Costo</th>
                    <th>Timpo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                <tr>
                    <td> <img src="/storage/{{$servicio['IMG_SERVICIO']}}" width="35" height="35" class="img-fluid  mx-auto d-block  "></td>
                    <td>{{$servicio['TIP_SERVICIO']}}</td>
                    <td>{{$servicio['COST_SERVICIO']}}</td>
                    <td>{{$servicio['TME_SEVICIO']}}</td>
                    <td>
                        @if($servicio['EST_SERVICIO'] === 1)
                        <span class=" badge badge-success">Activo</span>
                        @else

                        <span class=" badge badge-danger">Inactivo</span>

                        @endif
                    </td>
                    <td>
                        @if(auth()->user()->can('DELETE USER'))
                        <a type="button" class="btn btn-danger">Eliminar</a>
                        @endif
                        @if(auth()->user()->can('UPDATE USER'))
                        <a href={{ "servicios/".$servicio['COD_SERVICIO'].'/edit'}} type="button" class="btn btn-primary">Actualizar</a>
                        @endif
                        @if(auth()->user()->can('VIEW USER'))
                        <a href={{ "servicios/".$servicio['COD_SERVICIO']}} type="button" class="btn btn-secondary">Ver</a>
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

<script>
    $('#list-user').DataTable();
</script>
@endsection