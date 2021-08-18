@extends('adminlte::page')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    @foreach($productos as $producto)
                    <div class="col-12">
                        <img src="/storage/{{$producto['IMG_PRODUCTO']}}" class="product-image" alt="Product Image">
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
                <div class="col-12 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-center">Editar Producto {{$producto['NOM_PRODUCTO']}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action={{route('producto.update', $producto['COD_PRODUCTO'])}} method="post" id='formularioPersona' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tipo de Categoria</label>
                                    @foreach($categorias as $categoria)
                                    <select class="custom-select @error('categoria') is-invalid @enderror" name="categoria">
                                        <option>--Selecione Categoria--</option>
                                        <option value="{{$categoria['COD_CATEGORIA']}}" {{ $categoria['COD_CATEGORIA'] == $producto['COD_CATEGORIA'] ? 'selected' : '' }}> {{$categoria['NOM_CATEGORIA']}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre" value="{{$producto['NOM_PRODUCTO']}}">
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
                                            <i class="fas fa-certificate"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control @error('marca') is-invalid @enderror " name="marca" value="{{$producto['MAR_PRODUCTO']}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">Marca</div>
                                    </div>
                                </div>


                                <div class="input-group pt-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i>L.</i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control @error('costo') is-invalid @enderror " name="costo" value="{{$producto['COST_PRODUCTO']}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">Costo</div>
                                    </div>
                                </div>


                                <div class="input-group pt-4">
                                    <input type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{$producto['CAN_PRODUCTO']}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">Cantidad</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-check">

                                    @if($producto['EST_PRODUCTO'] === 1)
                                    <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <span class=" badge badge-success">Producto Activo</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <span class=" badge badge-danger">Desactivar Producto</span>
                                    </label>
                                    @else
                                    <input class="form-check-input" type="radio" name="estado" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <span class=" badge badge-success">Activar Producto</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" value="0" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <span class=" badge badge-danger">Producto Inactivo</span>
                                    </label>
                                    @endif

                                </div>

                                <hr>
                                <div class="form-group">
                                    <label>Descripcion Producto</label>
                                    <textarea class="form-control @error('Des_producto')  is-invalid  @enderror" name="Des_producto" rows="3" placeholder="Enter ..."> {{$producto['DES_PRODUCTO']}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion Inventario</label>
                                    <textarea class="form-control  @error('Des_inventario') is-invalid @enderror " rows="3" name="Des_inventario" placeholder="Enter ..."> {{$producto['DES_ENTRADA']}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label>Proveedores</label>
                                    @foreach($proveedores as $proveedor)
                                    <select class="custom-select @error('proveedor') is-invalid @enderror " name="proveedor">
                                        <option>--Selecione Proveedor--</option>
                                        <option value="{{$proveedor['COD_PROVEEDOR']}}" @foreach($proveedores1 as $pro) {{ $proveedor['COD_PROVEEDOR'] ==$pro['COD_PROVEEDOR'] ? 'selected' : '' }} @endforeach> {{$proveedor['NOM_EMPRESA']}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($proveedores1 as $pro)
                                <input type="hidden" name="detalle" value="{{$pro['COD_DET_COMPRA']}}">
                                @endforeach

                                @endforeach
                                <div class="card-footer mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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