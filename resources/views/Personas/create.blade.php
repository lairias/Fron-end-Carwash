@extends('adminlte::page')


@section('content')

<div class="container">

    <div class="text-center">

        <h3>Datos Personales</h3>

    </div>
    <div class="row">
        <div class="col-sm">
            <form action={{route('persona.store')}} method="post" id='formularioPersona' enctype="multipart/form-data" novalidate>
                @csrf
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror " name="nombre" placeholder="Nombre" value={{old('nombre')}}>

                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control  @error('correo') is-invalid @enderror " name="correo" placeholder="Correo Electrónico" value={{old('correo')}}>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control value={{old('password')}}" name="password" placeholder="Contraseña">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror " name="apellido" placeholder="Apellido" value={{old('apellido')}}>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Imagen</label>
                    <input class="form-control @error('imagen') is-invalid @enderror " type="file" id="imagen" name="imagen">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Identificación</label>
                    <input type="text" class="form-control @error('identificacion') is-invalid @enderror " name="identificacion" placeholder="0801-0000-0000" value={{old('identificacion')}}>
                </div>

                <hr>
                <div class="text-center">
                    <h3>Datos de localización</h3>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Número Teléfonico</label>
                    <input class="form-control  @error('num_telefono') is-invalid @enderror " type="phone" id="formFile" name="num_telefono" value={{old('num_telefono')}}>
                </div>
                <div class="col">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción del Teléfono</label>
                    <textarea class="form-control @error('des_telefono') is-invalid @enderror " id="exampleFormControlTextarea1" name="des_telefono" rows="3"> {{old('des_telefono')}} </textarea>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Número de casa</label>
                    <input class="form-control @error('num_casa') is-invalid @enderror " type="text" id="formFile" name="num_casa" value={{old('num_casa')}}>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Número de calle</label>
                    <input class="form-control @error('num_calle') is-invalid @enderror " type="text" id="formFile" name="num_calle" value={{old('num_calle')}}>
                </div>
                <div class="col">
                    <label for="formFile" class="form-label">Departamento</label>
                    <input class="form-control @error('departamento') is-invalid @enderror " type="text" id="formFile" name="departamento" value={{old('departamento')}}>
                </div>
                <div class="col">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción dirección</label>
                    <textarea class="form-control @error('des_direccion') is-invalid @enderror " " rows=" 3" name="des_direccion"> {{old('departamento')}}</textarea>
                </div>

                <div class="col pt-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Asignación de rol</label>
                    <select class="form-control  @error('permiso') invalid-feedback @enderror" name="permiso">
                        <option selected>--Selecione un Rol---</option>
                        @foreach($getRoles as $Rol)
                        <option value="{{$Rol['id']}}" {{old('permiso')}}==$Rol['id'] ? 'selected' : ''> {{$Rol['name']}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group pt-2">
                    <input type="submit" class="btn btn-primary" value="Agregar Persona">
                </div>
            </form>
        </div>

        <div class="col-sm">
            @error('nombre')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('correo')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('password')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('apellido')
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
            @error('identificacion')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('num_telefono')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('des_telefono')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('num_casa')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('num_calle')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('departamento')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('des_direccion')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('permiso')
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



@endsection