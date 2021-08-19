<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    //
    public function index(){

       
        $Testimoniales = Http::get('http://18.190.134.17:4000/Testimonial/');
        $ArrayTestimoniales = $Testimoniales->json();

        $ArayServicios = Http::get('http://18.190.134.17:4000/Servicio');
        $Servicios = $ArayServicios->json();
        $respuestaIMG = Http::get('http://18.190.134.17:4000/Imagenes');
        $Imagenes = $respuestaIMG->json();

        return view ('inicio.index',compact('Imagenes'))->with('ArrayTestimoniales', $ArrayTestimoniales)->with('Servicios', $Servicios);
    }
}



