@extends('adminlte::page')
@section('content')
<div class="card card-primary ">
    <div class="card-header">
        <h3 class="card-title text-center">Nueva Venta</h3>
    </div>
    <p>

        <button class="btn btn-primary m-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Nuevo cliente
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form id="formulario" action={{route('proveedor.store')}} method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id='nombre_add' placeholder="Nombre">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputPassword1">Apellido</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" id="apellido_add" placeholder="Apellido">
                        </div>



                        <div class="input-group pt-4 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion_add" name="identificacion">
                            <div class="input-group-append">
                                <div class="input-group-text">ID</div>
                            </div>
                        </div>


                        <div class="input-group pt-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="telefono_add" name="telefono">
                        </div>

                        <div class="input-group pt-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('RTN') is-invalid @enderror" id="RTN_add" name="RTN">
                            <div class="input-group-append">
                                <div class="input-group-text">RTN</div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer mt-3 text-center">
                        <button type="submit" id="clickCliente" class="btn btn-primary">Crear Cliente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
<hr>
<div id="encontrado"></div>
<form id="formulario_busqueda" action={{route('proveedor.store')}} method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="cliente_ID" id="cliente_ID" value="">
    <h3 class="text-center">Buscar Cliente</h3>
    <div class="card-body">
        <div class="row">
            <div class="input-group mt-4  col-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text">
                        <i class="fas fa-id-card"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="identificacion_bus" name="identificacion_bus">
                <div class="input-group-append">
                    <div class="input-group-text">ID</div>
                </div>
            </div>

            <div class="form-group col-4">
                <label for="exampleInputPassword1">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre_bus" id='nombre_bus' placeholder="Nombre" disabled>
            </div>
            <div class="form-group col-4">
                <label for="exampleInputPassword1">Apellido</label>
                <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido_bus" id="apellido_bus" placeholder="Apellido" disabled>
            </div>


        </div>


    </div>
</form>
<hr>

<nav aria-label="breadcrumb" class="">
    <div class="row">
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary">Vendedor</li>

                <li class="breadcrumb-item text-secondary">{{$user['name']}} {{$user['last_name']}} </li>
                <input type="hidden" id="CREADO_POR" value="{{$user['id']}}">
            </ol>


        </div>
        <div class="col-6">
            <h1>Acciones</h1>
            <button type="button" class="btn btn-primary">Procesar</button>
            <button type="button" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</nav>
<hr>



<table class="table">
    <thead class="bg-primary">
        <tr>
            <th width="160px">Código</th>
            <th>Nombre</th>
            <th>Existencia</th>
            <th width="100px">Cantidad</th>
            <th>Precio</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"> <input type="text" class="form-control" name="cod_producto" id="cod_producto" placeholder="XXXX-XXXX-XXXX" /></td>
            <td id="id_nombre">-</td>
            <td id="id_existencia">-</td>
            <td><input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="0" disabled /></td>
            <td id="id_precio">-</td>
            <td id="id_preciototal">-</td>
            <td><a href="" class="d-none " id="agregar"><i class="far fa-plus-square"></i></a></td>
        </tr>


    </tbody>
    <thead id='detalleVenta'>
        <tr class="bg-primary">
            <td>Código</td>
            <td colspan="2">Nombre</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Precio Total</td>
            <td>Acciones</td>
        </tr>
        <tr class="">
            <td>85858</td>
            <td colspan="2">Sellos</td>
            <td>10</td>
            <td>100</td>
            <td>100</td>
            <td> <a href="" onclick="event.preventDefault(); del_producto();">eliminar</a>Eliminar</td>
        </tr>

    </thead>
    <tfoot>
        <tr>
            <div class="text-nowrap bd-highlight" style="width: 8rem;">
                This text should overflow the parent.
            </div>
            <td colspan="5" class="textright">SubTotal</td>
            <td class="textright">888</td>
        </tr>
        <tr>
            <td colspan="5" class="textright">IVA (15%)</td>
            <td class="textright">500</td>
        </tr>
        <tr>
            <td colspan="5" class="textright">Total</td>
            <td class="textright">500</td>
        </tr>
    </tfoot>
</table>
</div>




<script>
    let Alerta = document.querySelector("#encontrado");
    let Formulario = document.querySelector("#formulario")
    let BuscarCliente = document.querySelector("#identificacion_bus");
    let Nombre = document.querySelector('#nombre')
    let Apellido = document.querySelector('#apellido')
    let Identificacion = document.querySelector('#identificacion');
    let NombreBUS = document.querySelector('#nombre_bus')
    let IdBUS = document.querySelector('#cliente_ID')
    let ApellidoBUS = document.querySelector('#apellido_bus')
    let Telefono = document.querySelector('#telefono');
    let Rtn = document.querySelector('#RTN');


    let nombre_add;
    let apellido_add;
    let identificacion_add;
    let telefono_add;
    let rtn_add;
    let Creado_por;
    let cantidad_add;


    let ID_CLIENTE;
    let CAN_VENTA;
    let CODIGO;


    let Codigo_producto = document.querySelector('#cod_producto');
    let Nombre_producto = document.querySelector('#id_nombre');
    let Existencia_producto = document.querySelector('#id_existencia');
    let Precio_producto = document.querySelector('#id_precio');
    let precio;

    let Precio_Total = document.querySelector('#id_preciototal');
    let Cantidad_producto = document.querySelector('#cantidad');
    let Agregar = document.querySelector('#agregar');

    Formulario.addEventListener("submit", (e) => {
        e.preventDefault();


        nombre_add = document.querySelector('#nombre_add').value;
        apellido_add = document.querySelector('#apellido_add').value;
        identificacion_add = document.querySelector('#identificacion_add').value;
        telefono_add = document.querySelector('#telefono_add').value;
        rtn_add = document.querySelector('#RTN_add').value;
        Creado_por = document.querySelector('#CREADO_POR').value;




        if (nombre_add.trim() == "" || apellido_add.trim() == "" || identificacion_add.trim() == "" || telefono_add.trim() == "") {

            Alerta.innerHTML = `
              <div class="alert alert-danger" role="alert"> Todos los compos son necesarios </div>
              `;
            setTimeout(() => {
                Alerta.innerHTML = ``;
            }, 3000);

        } else {

            if (rtn_add.trim() == '') {
                const data = {
                    NOMBRE: nombre_add,
                    APELLIDO: apellido_add,
                    CREADO_POR: Creado_por,
                    IDENTIFICACION: identificacion_add,
                    TELEFONO: telefono_add,
                    RNT_EMPRESA: null,
                }

                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                }
                debugger

                fetch('http://18.190.134.17:4000/Cliente', options).then(repuesta => {
                    debugger
                })
                console.log(data);
            } else {
                const data = {
                    NOMBRE: nombre_add,
                    APELLIDO: apellido_add,
                    CREADO_POR: Creado_por,
                    IDENTIFICACION: identificacion_add,
                    TELEFONO: telefono_add,
                    RNT_EMPRESA: rtn_add,
                }
                console.log(data);
                debugger
                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                }


                fetch('http://18.190.134.17:4000/Cliente', options).then(repuesta => {
                    debugger
                })
            }






        }
        // const data = {
        //     V_CODIGO: CODIGO,
        //     V_CAN_VENTA: CAN_VENTA,
        //     V_ID_CLIENTE: ID_CLIENTE
        // }
        // console.log(data);

        // const options = {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify(data),
        // }


        // fetch('http://18.190.134.17:4000/VentaDetalle', options).then(repuesta => {
        //     debugger
        // })

    });


    BuscarCliente.addEventListener('keyup', (e) => {
        e.preventDefault();
        let Cliente = async (Iden) => {
            let respuesta = await fetch(`http://18.190.134.17:4000/personaIdentificacion/${Iden}`);
            let res_cliente = await respuesta.json();
            if (res_cliente.length > 0) {

                res_cliente.map(async (X) => {
                    NombreBUS.value = X.name,
                        ApellidoBUS.value = X.last_name,
                        IdBUS.value = X.id,
                        ID_CLIENTE = X.id
                })
            } else {
                NombreBUS.value = ``;
                ApellidoBUS.value = ``;
                IdBUS.value = ``;
                Alerta.innerHTML = `
              <div class="alert alert-danger" role="alert"> Cliente no encontrado </div>
              `;
                setTimeout(() => {
                    Alerta.innerHTML = ``;
                }, 3000)
            }
        }
        if (e.keyCode == 13) {
            let Iden = e.target.value;
            Cliente(Iden);
        }

    })

    Codigo_producto.addEventListener('keyup', (e) => {
        e.preventDefault();

        const Codigo = async (Iden) => {
            console.log(`http://18.190.134.17:4000/ProductoCodigo/${Iden}`)
            let respuesta = await fetch(`http://18.190.134.17:4000/ProductoCodigo/${Iden}`);
            let res_cliente = await respuesta.json();
            if (res_cliente.length > 0) {

                res_cliente.map(async (X) => {
                    Cantidad_producto.value = 0,
                        Nombre_producto.innerHTML = `${ X.NOM_PRODUCTO}`,
                        Precio_producto.innerHTML = `${X.COST_PRODUCTO}`,
                        Existencia_producto.innerHTML = `${X.CAN_PRODUCTO}`,
                        precio = X.COST_PRODUCTO,
                        CAN_VENTA = X.CAN_PRODUCTO,
                        CODIGO = X.CODIGO

                    Cantidad_producto.removeAttribute('disabled')
                    Cantidad_producto.setAttribute("max", X.CAN_PRODUCTO)
                    Agregar.classList.remove('d-none');

                })


            } else {
                Nombre_producto.value = ``;
                ApellidoBUS.value = ``;
                IdBUS.value = ``;
                Alerta.innerHTML = `
              <div class="alert alert-danger" role="alert"> Producto no encontrado </div>
              `;
                setTimeout(() => {
                    Alerta.innerHTML = ``;
                }, 3000)
            }




        }
        if (e.keyCode == 13) {
            let cod = e.target.value;
            Codigo(cod);
        }
    });

    Cantidad_producto.addEventListener('keyup', e => {
        let PrecioFianl = (e.target.value * precio)
        Precio_Total.innerHTML = `${PrecioFianl}`
        cantidad_add = e.target.value;
        alert(cantidad_add)

    })


    Agregar.addEventListener("click", e => {
        e.preventDefault();



        const data = {
            V_CODIGO: CODIGO,
            V_CAN_VENTA: CAN_VENTA,
            V_ID_CLIENTE: ID_CLIENTE
        }
        console.log(data);

        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        }


        fetch('http://18.190.134.17:4000/VentaDetalle', options).then(repuesta => {
            debugger
        })
    });


    //Cancular el total
</script>
@endsection