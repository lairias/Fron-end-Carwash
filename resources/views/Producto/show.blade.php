@extends('adminlte::page')

@section('content')




<div class="card-body">
    <div class="row">
        <div class="col-12 col-sm-6">
            @foreach($productos as $producto)
            <div class="col-12">
                <img src="/storage/{{$producto['IMG_PRODUCTO']}}" class="product-image" alt="Product Image">
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$producto['NOM_PRODUCTO']}}</h3>
            <p>{{$producto['DES_PRODUCTO']}}</p>

            <hr>
            <h4>Estado</h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                    @if($producto['EST_PRODUCTO'] === 1)
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
            <hr>
            <h4 class="mt-3">Marca </h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                    <br>
                    {{$producto['MAR_PRODUCTO']}}
                </label>

            </div>
            <hr>
            <h4 class="mt-3"> Categoria</h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                    @foreach($categorias as $cate)

                    @if($cate['COD_CATEGORIA'] == $producto['COD_CATEGORIA'])
                    <span class="text-xl">{{$cate['NOM_CATEGORIA'] }}</span>
                    @endif
                    @endforeach
                    <br>

                </label>

            </div>
            <hr>
            <h4 class="mt-3">Precio Producto </h4>
            <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    L. {{$producto['COST_PRODUCTO']}}
                </h2>
            </div>
            <hr>
            <h4 class="mt-3">Cantidad Inventario </h4>
            <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    Uni. {{$producto['CAN_PRODUCTO']}}
                </h2>
            </div>

        </div>
    </div>
    @endforeach

</div>


@endsection