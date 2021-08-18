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

            <div class="card">

                <form action={{route('servicio.update',  $servicio['COD_SERVICIO'])}} method="post" id='formularioPersona' enctype="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción dirección</label>
                        <textarea class="form-control @error('des_direccion') is-invalid @enderror " rows=" 1" name="servicio"> {{$servicio['TIP_SERVICIO']}}</textarea>
                    </div>


                    <div class="col">
                        <label for="formFile" class="form-label">Imagen Servicio</label>
                        <input class="form-control @error('imagen') is-invalid @enderror " type="file" id="imagen" name="imagen">
                    </div>

                    <div class="col">

                        <label for="formFile" class="form-label">Estado Servicio</label>
                        <div class="form-check">
                            @if($servicio['EST_SERVICIO'] === 1)
                            <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <span class=" badge badge-success">Servicio Activo</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <span class=" badge badge-danger">Desactivar Servicio</span>
                            </label>
                            @else
                            <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <span class=" badge badge-success">Activar Servicio</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <span class=" badge badge-danger">Servicio Inactivo</span>
                            </label>
                            @endif

                        </div>
                    </div>




                    <label for="formFile" class="form-label">Costo del Servicio</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">L.</span>
                        <input type="number" class="form-control @error('costo') is-invalid @enderror" name="costo" value={{$servicio['COST_SERVICIO']}}>
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Timpo de Servicio</label>
                        <input type="number" class="form-control @error('tiempo') is-invalid @enderror " name="tiempo" value={{$servicio['TME_SEVICIO']}}>
                    </div>
                    <div class="col pt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Asignación de Servicio</label>
                        <select class="form-control  @error('permiso') invalid-feedback @enderror" name="empleado">
                            <option selected>--Empleados---</option>
                            @foreach($personas as $user)
                            <option value="{{$user['id']}}" {{$servicio['id_people']==$user['id'] ? 'selected' : ''}}> {{$user['name']}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción dirección</label>
                        <textarea class="form-control @error('des_direccion') is-invalid @enderror " " rows=" 3" name="des_servicio"> {{$servicio['Des_servicio']}}</textarea>
                    </div>

                    <div class="form-group pt-3     d-grid gap-2 col-6 mx-auto ">
                        <input type="submit" class="btn btn-primary center" value="Agregar Servicio">
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endforeach

</div>


@endsection