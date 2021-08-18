@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title text-center">Nuevo Rol</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action={{route('rol.store')}} method="post" id='formularioPersona'>
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre Rol">
                        </div>

                        <div class="row">

                            @foreach($AllRoles as $role)
                            <div class="form-check col-4">
                                <input type="checkbox" class="form-check-input" id={{"permiso_".$role['id']}} value="{{$role['id']}}" name="permiso[]">
                                <label class="form-check-label" for={{"permiso_".$role['id']}}>
                                    <span class="badge
                        bg-success
                        ">{{$role['name']}}</span> </label>
                            </div>

                            @endforeach
                        </div>

                        <div class="card-footer mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Crear</button>
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
            @error('marca')
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
            @error('cantidad')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('Des_producto')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('Des_inventario')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('imagen_compra')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('proveedor')
            <div aria-live="polite" aria-atomic="true" class="position-relative alerta">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @enderror
            @error('categoria')
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