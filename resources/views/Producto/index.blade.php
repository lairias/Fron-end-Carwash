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
                    <th>Producto</th>
                    <th>Costo</th>
                    <th>Marca</th>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td> <img src="/storage/{{$producto['IMG_PRODUCTO']}}" width="150" height="150" class="img-fluid  mx-auto d-block  "></td>
                    <td>{{$producto['NOM_PRODUCTO']}}</td>
                    <td>{{$producto['COST_PRODUCTO']}}</td>
                    <td>{{$producto['MAR_PRODUCTO']}}</td>
                    <td><svg id="{{$producto['CODIGO']}}"></svg></td>
                    <td>
                        @if($producto['EST_PRODUCTO'] === 1)
                        <span class=" badge badge-success">Activo</span>
                        @else

                        <span class=" badge badge-danger">Inactivo</span>

                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                            Launch Modal with Overlay
                        </button>
                        @if(auth()->user()->can('DELETE PRODUCTO'))
                        <a type="button" class="btn btn-danger">Eliminar</a>
                        @endif
                        @if(auth()->user()->can('UPDATE PRODUCTO'))
                        <a href={{ "productos/".$producto['COD_PRODUCTO'].'/edit'}} type="button" class="btn btn-primary">Actualizar</a>
                        @endif
                        @if(auth()->user()->can('VIEW PRODUCTO'))
                        <a href={{ "productos/".$producto['COD_PRODUCTO']}} type="button" class="btn btn-secondary">Ver</a>
                        @endif
                    </td>

                </tr>
                @endforeach


            </tbody>

        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.4/JsBarcode.all.min.js" integrity="sha512-9KXy/GLQQ+pPW7VwnI74DzjzUix9GINtAAPwWl4vzaaEqgfOeDgkea6UWM4xAvCeoeiBxzYepep2xxbkX3w/pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    
    window.addEventListener('DOMContentLoaded', async (event) => {
        const Codigo = async () => {
            const dia = await fetch('http://localhost:3000/Producto');

            const grafica = await dia.json();
            const grafica2 = await grafica;
            grafica2.map(async (x) => await JsBarcode(`#${x.CODIGO}`, `${x.CODIGO}`));

        }
        await Codigo();
    });
</script>
<script>
    $('#list-user').DataTable();
</script>
@endsection