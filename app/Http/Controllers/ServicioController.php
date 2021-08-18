<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prophecy\Promise\ReturnPromise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ServicioController extends Controller
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
        $respuesta = Http::get('http://localhost:3000/Servicio');
        $servicios = $respuesta->json();

        return view('Services.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $respuesta = Http::get('http://localhost:3000/persona');
        $personas = $respuesta->json();
        return view('Services.create', compact('personas'));
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
            'servicio' => "required|min:2",
            'imagen' => 'required',
            'costo' => 'required',
            'tiempo' => 'required',
            'empleado' => 'required'
        ]);




        $imagen = $request['imagen']->store('upload-servicios', 'public');

        Http::post('http://localhost:3000/Servicio',[
            "ID_PERSONA" => $data['empleado'],
            "TIP_SERVICIO" => $data['servicio'],
            "COST_SERVICIO" => $data['costo'],
            "ID_CREADO_POR" => Auth::id(),
            "IMG_SERVICIO" => $imagen,
            "TIEMPO" => $data['tiempo']
        ]);

        return redirect()->action([
            ServicioController::class, 'index'
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
        $respuesta =  Http::get('http://localhost:3000/Servicio/'.$id);
        $servicios = $respuesta->json();

        return view('Services.sho', compact('servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta =  Http::get('http://localhost:3000/Servicio/' . $id);
        $respuesta1 =  Http::get('http://localhost:3000/persona');
        $servicios = $respuesta->json();
        $personas = $respuesta1->json();

        return view('Services.edit', compact('servicios', 'personas'));
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
        
        if($data['imagen']){
            $imagen = $request['imagen']->store('upload-servicios', 'public');

            Http::put('http://localhost:3000/Servicio/'.$id,[
                "ID_PERSONA"=>$data['empleado'],
                "TIP_SERVICIO"=>$data['servicio'],
                "COST_SERVICIO" =>$data['costo'],
                "EST_SERVICIO"=>$data['estado'],
                "ID_MODIFICADO_POR"=> Auth::id(),
                "Des_servicio"=>$data['des_servicio'],
                "TIEMPO"=> $data['tiempo'],
                "IMG_SERVICIO"=> $imagen
            ]);
            return redirect()->action([
                ServicioController::class, 'index'
            ]);

        }else{
            $respuesta = Http::get('http://localhost:3000/Servicio/' . $id);
            $imagen = $respuesta->json();

            foreach ($imagen as $image) {
            Http::put('http://localhost:3000/Servicio/'.$id,[
                "ID_PERSONA" => $data['empleado'],
                "TIP_SERVICIO" => $data['servicio'],
                "COST_SERVICIO" => $data['costo'],
                "EST_SERVICIO" => $data['estado'],
                "ID_MODIFICADO_POR" => Auth::id(),
                "Des_servicio" => $data['des_servicio'],
                "TIEMPO" => $data['tiempo'],
                "IMG_SERVICIO" => $image['IMG_SERVICIO']
            ]);
        }
            return redirect()->action([
                ServicioController::class, 'index'
            ]);
    }
       
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
