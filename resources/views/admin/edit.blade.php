@extends('adminlte::page')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    @foreach($Imagenes as $producto)
                    <div class="col-12">
                        <img src="/storage/{{$producto['IMG']}}" class="product-image" alt="Product Image">
                    </div>

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




                </div>
                <div class="col-12 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-center">Editar Producto {{$producto['NOM_IMG']}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action={{route('admin.update', $producto['COD_IMG']) }} method="post" id='formularioPersona' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre" value="{{$producto['NOM_IMG']}}">
                                </div>


                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-folder-open"></i></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen">
                                        <label class="custom-file-label" for="exampleInputFile">Imagen</label>
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group">
                                    <label>Descripcion Imagen</label>
                                    <textarea class="form-control @error('Des_producto')  is-invalid  @enderror" name="Des_imagen" rows="3" placeholder="Enter ..."> {{$producto['DES_IMG']}} </textarea>
                                </div>
                                @endforeach
                                <div class="card-footer mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="submit" class="btn btn-danger"><a href="{{ route('admin.home') }}">Regresar </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>


@endsection