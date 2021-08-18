<?php

namespace App\Http\Controllers;

use Whoops\Run;
use App\Models\Estadistica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EstadisticaController extends Controller
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
       $personas = Http::get('http://localhost:3000/persona');
       $personasArray = $personas->json();
       
       return view('Estadistica.index',compact('personasArray'));
    }
    public function widgets()
    {
        
        $Total_personas = Http::get('http://localhost:3000/estadistica/TotalPeronas');
        $total = $Total_personas->json([0]);

        $Total_Producto = Http::get('http://localhost:3000/estadistica/CantidadProducto');
        $Productos = $Total_Producto->json([0]);

        $Total_Admi = Http::get('http://localhost:3000/estadistica/TotalAdministrado');
        $Admin = $Total_Admi->json([0]);

        $Total_empleado = Http::get('http://localhost:3000/estadistica/TotalEmpleado');
        $Empleado = $Total_empleado->json([0]);

        $Total_mecanico = Http::get('http://localhost:3000/estadistica/TotalEmpleado');
        $Mecanico = $Total_mecanico->json([0]);

        $Total_Proveedor = Http::get('http://localhost:3000/estadistica/Proveedor');
        $Proveedor = $Total_Proveedor->json([0]);

      
        
        return view('Estadistica.widgets', compact('total', 'Productos', 'Admin', 'Empleado', 'Mecanico', 'Proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function show(Estadistica $estadistica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadistica $estadistica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadistica $estadistica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadistica $estadistica)
    {
        //
    }
}
