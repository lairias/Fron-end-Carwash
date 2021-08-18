@extends('adminlte::page')






@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">


<div class="card pt-3">
    <div class="card-body">
        <table class="table table-dark " id="list-Roles">
            <thead>
                <tr>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Roles as $Rol)
                <tr>

                    <td>
                        {{$Rol['name']}}
                    </td>
                    <td>

                        @if(auth()->user()->can('UPDATE ROLES'))
                        <a href={{ "roles/".$Rol['id'].'/edit'}} type="button" class="btn btn-primary">Actualizar</a>
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
   
    $('#list-Roles').DataTable();
</script>
@endsection