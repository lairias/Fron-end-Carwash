@extends('adminlte::page')


@section('content')




<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @foreach ($persona as $user)
                            <img class="profile-user-img img-fluid img-circle" src="/storage/{{$user['imagen']}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$user["name"]}}</h3>


                        <p class="text-muted text-center">{{$user["last_name"]}}</p>


                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Telefono</b> <a class="float-right">

                                    @foreach($telefono as $telefo)
                                    {{$telefo['NUM_TELEFONO']}}
                                    @endforeach

                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Estado</b> <a class="float-right">
                                    @if($user['estado'] === 1)
                                    <span class=" badge badge-success">Activo</span>
                                    @else

                                    <span class=" badge badge-danger">Inactivo</span>

                                    @endif
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        @foreach($direccion as $dire)
                        <p class="text-muted">{{$dire['DEPARTAMENTO']}}</p>
                        @endforeach
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Estado</strong>

                        @if($user['estado'] === 1)
                        <span class=" badge badge-success">Activo</span>
                        @else

                        <span class=" badge badge-danger">Inactivo</span>

                        @endif

                        <hr>
                        <strong><i class="fas fa-user-clock mr-1"></i> Tiempo de regitro</strong>

                        <p class="text-muted">{{\Carbon\Carbon::parse($user['created_at'])->longAbsoluteDiffForHumans()}}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Perfil</strong>
                        <p class="text-muted"> {{$user1}} </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                @endforeach
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="card card-primary card-outline">

                    <div class="card-body box-profile">
                        @foreach($persona as $user)
                        <form action={{route('persona.update', $user['id']) }} method="post" id='formularioPersona' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror " name="nombre" placeholder="Nombre" value={{$user['name']}}>

                            </div>


                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control  @error('correo') is-invalid @enderror " name="correo" placeholder="Correo Electrónico" value={{$user['email']}}>
                            </div>

                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value={{$user['last_name']}} placeholder="Apellido">
                            </div>
                            <div class="col">
                                <label for="formFile" class="form-label">Imagen</label>
                                <input class="form-control @error('imagen') is-invalid @enderror" type="file" name="imagen">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Identificación</label>
                                <input type="text" class="form-control @error('identificacion') is-invalid @enderror " name="identificacion" placeholder="0801-0000-0000" value={{$user['identificacion']}}>
                            </div>




                            <div class="form-check">


                                @if($user['estado'] === 1)
                                <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <span class=" badge badge-success">Cuenta Activa</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <span class=" badge badge-danger">Desactivar cuenta</span>
                                </label>
                                @else
                                <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <span class=" badge badge-success">Activar cuenta</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <span class=" badge badge-danger">Cuenta Inactiva</span>
                                </label>
                                @endif

                            </div>








                    </div>

                    <hr>
                    <div class="text-center">
                        @foreach($telefono as $telefo)
                        <h3>Datos de localización</h3>
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Número Teléfonico</label>
                        <input class="form-control  @error('num_telefono') is-invalid @enderror " type="phone" id="formFile" name="num_telefono" value={{$telefo['NUM_TELEFONO']}}>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción del Teléfono</label>
                        <textarea class="form-control @error('des_telefono') is-invalid @enderror " id="exampleFormControlTextarea1" name="des_telefono" rows="3"> {{$telefo['DES_TELEFONO']}} @endforeach </textarea>
                    </div>
                    <div class="col">
                        @foreach($direccion as $dire)
                        <label for="formFile" class="form-label">Número de casa</label>
                        <input class="form-control @error('num_casa') is-invalid @enderror " type="text" id="formFile" name="num_casa" value={{$dire['NUM_CASA']}}>
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Número de calle</label>
                        <input class="form-control @error('num_calle') is-invalid @enderror " type="text" id="formFile" name="num_calle" value={{$dire['NUM_CALLE']}} }}>
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Departamento</label>
                        <input class="form-control @error('departamento') is-invalid @enderror " type="text" id="formFile" name="departamento" value={{$dire['DEPARTAMENTO']}}>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción dirección</label>
                        <textarea class="form-control @error('des_direccion') is-invalid @enderror " " rows=" 3" name="des_direccion"> {{$dire['DES_DIRECCION']}} @endforeach</textarea>
                    </div>

                    <div class="col pt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Asignación de rol</label>
                        <select class="form-control  @error('permiso') invalid-feedback @enderror" name="permiso">
                            <option selected>--Selecione un Rol---</option>
                            @foreach($getRoles as $Rol)
                            <option value="{{$Rol['id']}}" {{ $user1 ==$Rol['name'] ? 'selected' : '' }}> {{$Rol['name']}}</option>
                            @endforeach
                        </select>

                    </div>
                    @endforeach
                    <div class="form-group pt-2">
                        <input type="submit" class="btn btn-primary" value="Agregar Persona">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>





<div class="container">


    <div class="row">
        <div class="col-sm">

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



</div>

<script>
</script>
@endsection