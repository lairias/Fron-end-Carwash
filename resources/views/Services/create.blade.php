@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Nuevo Servicio</h2>
    </div>
    <div class="card">
        <div class="row">
            <div class="col-sm">
                <form action={{route('servicio.store')}} method="post" id='formularioPersona' enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Nombre Servicio</label>
                        <input type="text" class="form-control @error('servicio') is-invalid @enderror " name="servicio" placeholder="servicio" value={{old('servicio')}}>

                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Imagen Servicio</label>
                        <input class="form-control @error('imagen') is-invalid @enderror " type="file" id="imagen" name="imagen">
                    </div>

                    <label for="formFile" class="form-label">Costo del Servicio</label>
                    <div class="input-group mb-3">

                        <span class="input-group-text">L.</span>
                        <input type="number" class="form-control @error('costo') is-invalid @enderror" name="costo" value={{old('costo')}}>
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Timpo de Servicio</label>
                        <input type="number" class="form-control @error('tiempo') is-invalid @enderror " name="tiempo" value={{old('tiempo')}}>
                    </div>
                    <div class="col pt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Asignación de Servicio</label>
                        <select class="form-control  @error('permiso') invalid-feedback @enderror" name="empleado">
                            <option selected>--Empleados---</option>
                            @foreach($personas as $user)
                            <option value="{{$user['id']}}" {{old('empleado')}}==$user['id'] ? 'selected' : ''> {{$user['name']}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción dirección</label>
                        <textarea class="form-control @error('des_direccion') is-invalid @enderror " " rows=" 3" name="des_direccion"> {{old('departamento')}}</textarea>
                    </div>

                    <div class="form-group pt-3     d-grid gap-2 col-6 mx-auto ">
                        <input type="submit" class="btn btn-primary center" value="Agregar Servicio">
                    </div>
                </form>
            </div>

            <div class="col-sm">
                @error('servicio')
                <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @enderror
                @error('imagen')
                <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @enderror
                @error('costo')
                <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @enderror
                @error('tiempo')
                <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @enderror
                @error('empleado')
                <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @enderror

            </div>

        </div>
    </div>

</div>


@endsection