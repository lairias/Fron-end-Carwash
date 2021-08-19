<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\VarDumper\Cloner\Data;

class RolesControlador extends Controller
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

        $respuesta = Http::get('http://18.190.134.17:4000/Permisos');
        $personas = $respuesta->json();
        $respuesta1 = Http::get('http://18.190.134.17:4000/Roles/');
        $Roles = $respuesta1->json();

       

        return view("Roles.index",compact('personas','Roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta2 = Http::get('http://18.190.134.17:4000/RolesH/');
        $AllRoles = $respuesta2->json();
        return view('Roles.create', compact('AllRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request;

        Http::post('http://18.190.134.17:4000/Roles',[
            "NAME"=> $data['nombre']
        ]);

        $id= 0;
        $respuesta = Http::get('http://18.190.134.17:4000/RolesNombre/'.$data["nombre"]);
        $ROLES = $respuesta->json();
       foreach($ROLES as $rol){
           $id = $rol['id'];

       }
       foreach($data['permiso'] as $permiso){
           Http::post('http://18.190.134.17:4000/RolesH/',[
                "IDPERMI" => $permiso ,
                "IDROL" => $id
           ]);
       }
        return redirect()->action([
            RolesControlador::class, 'index'
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
        $respuesta = Http::get('http://18.190.134.17:4000/RolesN/'.$id);
        $Count = $respuesta->json();
        $respuesta1 = Http::get('http://18.190.134.17:4000/Roles/'.$id);
        $Roles = $respuesta1->json();
        $respuesta2 = Http::get('http://18.190.134.17:4000/RolesH/');
        $AllRoles = $respuesta2->json();

       return view('Roles.edit',compact('Roles','Count', 'AllRoles'));
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
        $data = $request;
       
        $respuesta1 = Http::get('http://18.190.134.17:4000/Roles/' . $id);
        $Roles = $respuesta1->json();
        foreach($Roles as $roles){
            foreach($data['permiso'] as $da){

                if ($roles['PermisoID'] == $da) {
                    Http::post('http://18.190.134.17:4000/RolesH/', [
                        "IDPERMI" => $da,"IDROL" => $id]);
                    
                }else{
                    Http::post('http://18.190.134.17:4000/RolesH/', [
                        "IDPERMI" => $da,
                        "IDROL" => $id
                    ]);
                    Http::delete('http://18.190.134.17:4000/Roles/' . $id, [
                        "Rol" => $roles['PermisoID']
                    ]);
                }
                
            }
           
        }
        return redirect()->action([
            RolesControlador::class, 'index'
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
