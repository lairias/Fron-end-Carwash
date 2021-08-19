<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class User extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Http::post('http://18.190.134.17:4000/Bitacora', [
            'ID_PERSONA' => Auth::id(),
            'ACCION' => "Persona Controlador - Vista Personas",
            'DES_BITACORA' => 'Ingreso a las vista de todas las personas',
            'Icono'=> 'far fa-list-alt'
        ]);

        $respuesta = Http::get('http://18.190.134.17:4000/persona');
        $personas = $respuesta->json();

     

        return view('Personas.index',compact('personas'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        Http::post('http://18.190.134.17:4000/Bitacora', [
            'ID_PERSONA' => Auth::id(),
            'ACCION' => "Persona Controlador - Vista Nueva-Persona",
            'DES_BITACORA' => 'Ingreso a la vista de nueva persona',
            'Icono'=> 'far fa-eye'
        ]);

       $roles =  Http::get('http://18.190.134.17:4000/Roles');
       $getRoles = $roles->json();

        return view('Personas.create',compact('getRoles'));

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
            'correo' => 'required',
            'password' => 'required',
            'apellido' => 'required',
            'imagen' => 'required|image',
            'identificacion' => 'required',
            'num_telefono' => 'required',
            'des_telefono' => 'required',
            'num_casa' => 'required',
            'num_calle' => 'required',
            'departamento' => 'required',
            'des_direccion' => 'required',
            'permiso' => 'required',
        ]) ;

        $imagen = $request['imagen']->store('upload-personas', 'public');
         Http::post('http://18.190.134.17:4000/persona',[

            "name" =>$data['nombre'],
            "email" =>$data['correo'],
            "password" => Hash::make($data['password']),
            "last_name" =>$data['apellido'],
            "imagen" => $imagen,
            "identificacion" =>$data['identificacion'],
            "creado_por" => Auth::id(),
            "num_telefono" =>$data['num_telefono'],
            "des_telefono" =>$data['des_telefono'],
            "num_casa" =>$data['num_casa'],
            "num_calle" =>$data['num_calle'],
            "departamento" =>$data['departamento'],
            "des_direccion" =>$data['des_direccion'],
            "permiso" =>$data['permiso']
        ]);
        Http::post('http://18.190.134.17:4000/Bitacora', [
            'ID_PERSONA' => Auth::id(),
            'ACCION' => "Persona Controlador -  Nueva Personas",
            'DES_BITACORA' => 'Creo una nueva persona',
            'Icono' => 'fas fa-user-plus']);
        return redirect()->action([User::class, 'index'
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
        Http::post('http://18.190.134.17:4000/Bitacora', [
            'ID_PERSONA' => Auth::id(),
            'ACCION' => "Persona Controlador - Vista Persona",
            'DES_BITACORA' => 'Perfil de un Usuario ID',
            'Icono' => 'far fa-eye'

        ]);
       $Line = Http::get('http://18.190.134.17:4000/Bitacora/'.$id);
       $Bitacoras = $Line->json();




        $respuesta = Http::get('http://18.190.134.17:4000/persona/'.$id);
        $persona = $respuesta->json();

        $respuesta2 = Http::get('http://18.190.134.17:4000/Telefonos/'.$id);
        $telefono = $respuesta2->json();
        $respuesta3 = Http::get('http://18.190.134.17:4000/Direccion/'.$id);
        $direccion = $respuesta3->json();
        
        return  view('Personas.show', compact('persona', 'Bitacoras','telefono', 'direccion'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles =  Http::get('http://18.190.134.17:4000/Roles');
        $getRoles = $roles->json();

        $user = Auth::user();
        $user1 = $user->roles->implode('name','');



        $respuesta = Http::get('http://18.190.134.17:4000/persona/' . $id);
        $persona = $respuesta->json();

        $respuesta2 = Http::get('http://18.190.134.17:4000/Telefonos/' . $id);
        $telefono = $respuesta2->json();
        $respuesta3 = Http::get('http://18.190.134.17:4000/Direccion/' . $id);
        $direccion = $respuesta3->json();

        return view("Personas.edit", compact('getRoles','persona','user1','telefono', 'direccion'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $data= request();


       
       
         request()->validate([
            'nombre' => "required|min:2",
            'correo' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required',
            'num_telefono' => 'required',
            'des_telefono' => 'required',
            'num_casa' => 'required',
            'num_calle' => 'required',
            'departamento' => 'required',
            'des_direccion' => 'required',
            'permiso' => 'required',
        ]);
       
        if($data['imagen']){

            $imagen = $request['imagen']->store('upload-personas', 'public');

            Http::put('http://18.190.134.17:4000/persona/' . $id, [
                "name" => $data['nombre'],
                "email" => $data['correo'],
                "last_name" => $data['apellido'],
                "imagen" => $imagen,
                "identificacion" => $data['identificacion'],
                "modificado_por" => Auth::id(),
                "num_telefono" => $data['num_telefono'],
                "des_telefono" => $data['des_telefono'],
                "num_casa" => $data['num_casa'],
                "num_calle" => $data['num_calle'],
                "departamento" => $data['departamento'],
                "des_direccion" => $data['des_direccion'],
                "id" => $id,
                "permiso" => $data['permiso'],
                "estado" => $data['estado']
            ]);
        }else{
            $respuesta = Http::get('http://18.190.134.17:4000/persona/' . $id);
            $imagen = $respuesta->json();
            foreach ($imagen as $image) {
                Http::put('http://18.190.134.17:4000/persona/' . $id, [
                    "name" => $data['nombre'],
                    "email" => $data['correo'],
                    "last_name" => $data['apellido'],
                    "imagen" => $image['imagen'],
                    "identificacion" => $data['identificacion'],
                    "modificado_por" => Auth::id(),
                    "num_telefono" => $data['num_telefono'],
                    "des_telefono" => $data['des_telefono'],
                    "num_casa" => $data['num_casa'],
                    "num_calle" => $data['num_calle'],
                    "departamento" => $data['departamento'],
                    "des_direccion" => $data['des_direccion'],
                    "id" => $id,
                    "permiso" => $data['permiso'],
                    "estado" => $data['estado']
                ]);
            }
            

        }



        return redirect()->action([
            User::class, 'index'
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
