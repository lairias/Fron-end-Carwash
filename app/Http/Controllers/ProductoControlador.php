<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpKernel\HttpKernel;

class ProductoControlador extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuest1 = Http::get('http://localhost:3000/Producto');
        $productos = $respuest1->json();

        return view('Producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = Http::get('http://localhost:3000/Producto');
        $respuesta1 = Http::get('http://localhost:3000/Categoria');
        $respuesta2 = Http::get('http://localhost:3000/Proveedor');
        $categorias = $respuesta1->json();
        $proveedores = $respuesta2->json();
        $productos = $respuesta->json();

        return view('Producto.create',compact('productos', 'categorias','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => "required",
            'imagen' => 'required|image',
            'marca' => 'required',
            'costo' => 'required',
            'cantidad' => 'required',
            'Des_producto' => 'required',
            'Des_inventario' => 'required',
            'proveedor' => 'required',
            'categoria' => 'required',
        ]);
        $data = Request();

        $respuesta =  Http::get('http://localhost:3000/Seguridad/4');
        $IVA = $respuesta->json();
        foreach($IVA as $impuesto){
            if ($data['imagen_compra']) {
                //Imagenes
                $imagenProducto = $request['imagen']->store('upload-producto', 'public');
                $imagenCompra = $request['imagen_compra']->store('upload-producto-compra', 'public');
                

                Http::post('http://localhost:3000/Producto', [
                    'COD_CATEGORIA' => $data['categoria'],
                    'NOM_PRODUCTO' => $data['nombre'],
                    'IMG_PRODUCTO' =>  $imagenProducto,
                    'MAR_PRODUCTO' => $data['marca'],
                    'COST_PRODUCTO' => $data['costo'],
                    'CAN_PRODUCTO' => $data['cantidad'],
                    'DES_PRODUCTO' => $data['Des_producto'],
                    'DES_ENTRADA' => $data['Des_inventario'],
                    'ID_PERSONA' => Auth::id(),
                    'PROVEEDOR' => $data['proveedor'],
                    'IMG_COMPRA' =>  $imagenCompra,
                    'IVA' => $impuesto['DES_SEGURIDAD']
                ]);
            } else {
                $imagenProducto = $request['imagen']->store('upload-producto', 'public');
                Http::post('http://localhost:3000/Producto', [
                    'COD_CATEGORIA' => $data['categoria'],
                    'NOM_PRODUCTO' => $data['nombre'],
                    'IMG_PRODUCTO' =>  $imagenProducto,
                    'MAR_PRODUCTO' => $data['marca'],
                    'COST_PRODUCTO' => $data['costo'],
                    'CAN_PRODUCTO' => $data['cantidad'],
                    'DES_PRODUCTO' => $data['Des_producto'],
                    'DES_ENTRADA' => $data['Des_inventario'],
                    'ID_PERSONA' => Auth::id(),
                    'PROVEEDOR' => $data['proveedor'],
                    'IMG_COMPRA' => NULL,
                    'IVA' => $impuesto['DES_SEGURIDAD']
                ]);
            }

}
        return redirect()->action([
            ProductoControlador::class, 'index'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta1 = Http::get('http://localhost:3000/Categoria');
        $respuesta = Http::get('http://localhost:3000/Producto/' . $id);
        $productos = $respuesta->json();
        $categorias = $respuesta1->json();
        return view('Producto.show', compact('productos','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = Http::get('http://localhost:3000/Producto/'.$id);
        $respuesta1 = Http::get('http://localhost:3000/Categoria');
        $respuesta2 = Http::get('http://localhost:3000/Proveedor');
        $respuesta3 = Http::get('http://localhost:3000/ProveedorProduc/' . $id);

        $categorias = $respuesta1->json();
        $proveedores = $respuesta2->json();
        $proveedores1 = $respuesta3->json();
        $productos = $respuesta->json();
        return view('Producto.edit', compact('productos', 'categorias', 'proveedores', 'proveedores1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = Request();

        $respuesta =  Http::get('http://localhost:3000/Seguridad/4');
        $IVA = $respuesta->json();
        foreach ($IVA as $impuesto) {
            
            if ( $data['imagen']) {
                //Imagenes

                $imagenProducto = $request['imagen']->store('upload-producto', 'public');
                Http::put('http://localhost:3000/Producto/'.$id,[
                    'COD_CATEGORIA' => $data['categoria'],
                    'NOM_PRODUCTO' => $data['nombre'],
                    'IMG_PRODUCTO' =>  $imagenProducto,
                    'MAR_PRODUCTO' => $data['marca'],
                    'COST_PRODUCTO' => $data['costo'],
                    'CAN_PRODUCTO' => $data['cantidad'],
                    'DES_PRODUCTO' => $data['Des_producto'],
                    'EST_PRODUCTO' => $data['estado'],
                    'DES_ENTRADA' => $data['Des_inventario'],
                    'DETALLE' => $data['detalle'],
                    'MODIFICADO_POR' => Auth::id(),
                    'PROVEEDOR' => $data['proveedor'],
                    'IMG_COMPRA' =>  null,
                    'IVA' => $impuesto['DES_SEGURIDAD']
                ]);
            } else {

               $respuesta =  Http::get('http://localhost:3000/Producto/' . $id);
               $imgen = $respuesta->json();
               foreach($imgen as $imagen){
                    Http::put('http://localhost:3000/Producto/' . $id, [
                        'COD_CATEGORIA' => $data['categoria'],
                        'NOM_PRODUCTO' => $data['nombre'],
                        'IMG_PRODUCTO' =>  $imagen['IMG_PRODUCTO'],
                        'MAR_PRODUCTO' => $data['marca'],
                        'COST_PRODUCTO' => $data['costo'],
                        'CAN_PRODUCTO' => $data['cantidad'],
                        'DES_PRODUCTO' => $data['Des_producto'],
                        'EST_PRODUCTO' => $data['estado'],
                        'DES_ENTRADA' => $data['Des_inventario'],
                        'DETALLE' => $data['detalle'],
                        'MODIFICADO_POR' => Auth::id(),
                        'PROVEEDOR' => $data['proveedor'],
                        'IMG_COMPRA' =>  null,
                        'IVA' => $impuesto['DES_SEGURIDAD']
                    ]);
            }
            }

        
    }
        return redirect()->action([
            ProductoControlador::class, 'index'
        ]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
