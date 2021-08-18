@extends('adminlte::page')

@section('title','Widgets')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-text">Total personas</span>
                    <span class="info-box-number">{{$total['TOTAL']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-cart-plus"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-text">Productos</span>
                    <span class="info-box-number">{{$Productos['COUNT(COD_PRODUCTO)']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-user-tie"></i>

                    </i></span>

                <div class="info-box-content">
                    <span class="info-text">Administradores</span>
                    <span class="info-box-number">{{$Admin['COUNT(role_id)']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-people-carry"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-text">Empleados</span>
                    <span class="info-box-number">{{$Empleado['COUNT(role_id)']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-car-battery"></i>

                </span>

                <div class="info-box-content">
                    <span class="info-text">Mecanicos</span>
                    <span class="info-box-number">{{$Mecanico['COUNT(role_id)']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info">

                    <i class="fas fa-dolly"></i>

                </span>

                <div class="info-box-content">
                    <span class="info-text">Proveedores</span>
                    <span class="info-box-number">{{$Proveedor['COUNT(COD_PROVEEDOR)']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>


    </div>

</div>



@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>