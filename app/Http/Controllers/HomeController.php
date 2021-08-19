<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Contracts\HttpClient\Test\HttpClientTestCase;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        Http::post('http://18.190.134.17:4000/Bitacora', [
            'ID_PERSONA' => Auth::id(),
            'ACCION' => "Inicio Controlador - Vista Inicial",
            'DES_BITACORA' => 'Ingreso al sistema',
            'Icono' => 'fas fa-sign-in-alt'
        ]);

        $estado = auth()->user()->estado;
        if ($estado) {


           $respuesta =Http::get('http://18.190.134.17:4000/Imagenes');
           $Imagenes = $respuesta->json();
            return view('admin.home',compact('Imagenes'));
        } else {
            return view('admin.Inactivo');
        }
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

        $respuesta =  Http::get('http://18.190.134.17:4000/Imagenes/'.$id);
        $Imagenes  = $respuesta->json();
        return view("admin.edit",compact("Imagenes"));
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
        $data = request();
        $data = request()->validate([
            'nombre' => "required|min:2",
            'Des_imagen' => 'required',
            'imagen' => 'required|image|max:50000']);

        $imagen = $request['imagen']->store('upload-Incio', 'public');

            Http::put('http://18.190.134.17:4000/Imagenes/'.$id, [
                "IMG" => $imagen,
                "NOM_IMG" => $data['nombre'],
                "DES_IMG" => $data['Des_imagen'],
                
            ]);


        return redirect()->action([
            HomeController::class, 'index'
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
