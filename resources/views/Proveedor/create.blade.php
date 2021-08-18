@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title text-center">Nuevo Proveedor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action={{route('proveedor.store')}} method="post" id='formularioPersona' enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" placeholder="Apellido">
                        </div>


                        <div class="input-group">
                            <div class="input-group-text"><i class="far fa-folder-open"></i></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen">
                                <label class="custom-file-label" for="exampleInputFile">Imagen</label>
                            </div>
                        </div>




                        <div class="input-group pt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion">
                            <div class="input-group-append">
                                <div class="input-group-text">ID</div>
                            </div>
                        </div>


                        <div class="input-group pt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono">
                        </div>

                        <div class="input-group pt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('RTN') is-invalid @enderror" name="RTN">
                            <div class="input-group-append">
                                <div class="input-group-text">RTN</div>
                            </div>
                        </div>

                        <div class="input-group pt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('RTN') is-invalid @enderror" name="empresa">
                            <div class="input-group-append">
                                <div class="input-group-text">Empresa</div>
                            </div>
                        </div>


                        <div class="card-footer mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Crear Proveedor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-12 col-sm-6">
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
            @error('telefono')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('RTN')
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