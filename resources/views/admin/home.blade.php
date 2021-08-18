@extends('adminlte::page')

@section('title','Administracion')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">Imagenes Inicio</div>

        <div class="card-body">
            <div class="row">
                @foreach($Imagenes as $imagen)
                <div class="col-4">

                    <div class="card" style="width: 18rem;">
                        <img src="/storage/{{$imagen['IMG']}}" while="220px" height="170px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$imagen['NOM_IMG']}}</h5>
                            <p class="card-text">{{$imagen['DES_IMG']}}</p>

                            @if(auth()->user()->can('EDIT IMAGE'))
                            <a href={{ "admin/".$imagen['COD_IMG'].'/edit'}} class="btn btn-primary">Editar</a>
                            @endif
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
</div>
@endsection





@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop