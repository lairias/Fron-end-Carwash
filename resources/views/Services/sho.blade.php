@extends('adminlte::page')

@section('content')




<div class="card-body">
    <div class="row">
        <div class="col-12 col-sm-6">
            @foreach($servicios as $servicio)
            <div class="col-12">
                <img src="/storage/{{$servicio['IMG_SERVICIO']}}" class="product-image" alt="Product Image">
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$servicio['TIP_SERVICIO']}}</h3>
            <p>{{$servicio['Des_servicio']}}</p>

            <hr>
            <h4>Available Colors</h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                    @if($servicio['EST_SERVICIO'] === 1)
                    Activo
                    <br>
                    <i class="fas fa-circle fa-2x text-green"></i>
                    @else
                    Inactivo
                    <br>
                    <i class="fas fa-circle fa-2x text-danger"></i>
                    @endif

                </label>

            </div>

            <h4 class="mt-3">Tiempo de servicio </h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                    <span class="text-xl"> {{$servicio['TME_SEVICIO']}}</span>
                    <br>
                    Munitos
                </label>

            </div>

            <h4 class="mt-3">Precio Servicio </h4>
            <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                   L. {{$servicio['COST_SERVICIO']}}
                </h2>
            </div>

        </div>
    </div>
    @endforeach

</div>


@endsection