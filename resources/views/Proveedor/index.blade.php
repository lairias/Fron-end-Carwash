@extends('adminlte::page')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($proveedores as $proveedor)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            {{$proveedor['NOM_EMPRESA']}} - <i class="fas fa-lg fa-building"></i>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{$proveedor['name']}}</b></h2>
                                    <p class="text-muted text-sm"><b>RTN: </b> {{$proveedor['RTN_EMPRESA']}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        </span> Creado por :
                                        @foreach($user as $use)
                                        @if($use['id'] == $proveedor['creado_por'])
                                        {{$use['name']}}
                                        @endif
                                        @endforeach
                                        </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:

                                            @foreach($telefonos as $telefono)
                                            @if($telefono['id_people'] == $proveedor['id'])
                                            {{$telefono['NUM_TELEFONO']}}
                                            @endif
                                            @endforeach

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="/storage/{{$proveedor['imagen']}}" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>
@endsection