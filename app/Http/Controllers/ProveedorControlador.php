<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProveedorControlador extends Controller
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

        $respuesta = Http::get('http://localhost:3000/Proveedor');
        $respuesta1 = Http::get('http://localhost:3000/persona');
        $respuesta2 = Http::get('http://localhost:3000/ProveedorTelefono');
        $proveedores = $respuesta->json();
        $telefonos = $respuesta2->json();
        $user = $respuesta1->json();


        return view('Proveedor.index', compact('proveedores','user', 'telefonos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => "required|min:2",
            'apellido' => 'required',
            'imagen' => 'required|image',
            'identificacion' => 'required',
            'telefono' => 'required',
            'RTN' => 'required',
            'empresa' => 'required',
            
        ]);

        $imagen = $request['imagen']->store('upload-proveedor', 'public');
        Http::post('http://localhost:3000/Proveedor', [

            "NOMBRE" => $data['nombre'],
            "APELLIDO" => $data['apellido'],
            "IMAGEN" =>$imagen,
            "CREADO_POR"=> Auth::id(),
            "IDENTIFICACION" => $data['identificacion'],
            "TELEFONO" => $data['telefono'],
            "RTN_EMPRESA" => $data['RTN'],
            "NOM_EMPRESA" => $data['empresa'],
        ]);

        return redirect()->action([
            ProveedorControlador::class, 'index'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
