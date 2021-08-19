@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">




@endsection







@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

@foreach($Imagenes as $imagen)
@if($imagen['COD_IMG'] == '2')

<style>
    div.contador::before {
        background-image: url(/storage/{{$imagen["IMG"]}});
        content: '';

    }
</style>
@endif
@endforeach
@foreach($Imagenes as $imagen)
@if($imagen['COD_IMG'] == '3')

<style>
    div.newsletter::before {
        background-image: url(/storage/{{$imagen["IMG"]}});
        content: '';
    }
</style>
@endif
@endforeach
@foreach($Imagenes as $imagen)
@if($imagen['COD_IMG'] == '7')

<style>
    h2::after {
        content: '';
        margin: 0 auto;
        background-image: url(/storage/{{$imagen["IMG"]}});
        height: 30px;
        width: 100px;
        display: block;
    }
</style>
@endif
@endforeach




<header class="site-header">
    @foreach($Imagenes as $imagen)
    @if($imagen['COD_IMG'] == '1')

    <img class="imagen" src="/storage/{{$imagen['IMG']}}" alt="">
    @endif
    @endforeach
    <div class="container">


        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-pinterest-p"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <h1 class="nombre-sitio">CarwashHN</h1>
                    <p class="slogan">
                        El mejor centro de <span>Autolavado</span>
                    </p>
                </div>
                <!--Informacion evento-->
            </div>
        </div>
    </div>
</header>

<div class="barra">
    <div class="contenedor clearfix">
        <nav class="navegacion-principal clearfix">
            <a href="#">Conferencis</a>
            <a href="#">Calendario</a>
            <a href="#">Invitados</a>
            <a href="registro.html">Reservaciones</a>
        </nav>
    </div>
    <!--contenedor-->
</div>
<!--Fin de la barra-->

<section class="seccion contenedor">
    <h2>CarwashHN</h2>

    <p>
        se compromete a brindar la mejor experiencia de lavado de autos en Finger Lakes mientras tiene un impacto mínimo en nuestro medio ambiente.
    </p>
</section>
<section class="programa">
    <div class="contenedor-video">
        <video autoplay loop style="width: 2009px; height: 672px; object-fit: cover; object-position: 50% 50%;">
            <source src="/img/video.mp4" type="" />
        </video>
    </div>

    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
                <h2>Reservaciones</h2>

                <div id="talleres" class="info-curso ocultarr clearfix">
                    <div class="detalle-evento">
                        <p><i class="fas fa-clock"></i>16:00 hrs</p>
                        <p><i class="fas fa-clock"></i>16:00 hrs</p>
                        <p><i class="fas fa-clock"></i>16:00 hrs</p>
                        <p><i class="fas fa-clock"></i>16:00 hrs</p>
                        <p><i class="fas fa-clock"></i>16:00 hrs</p>
                        <p><i class="fas fa-calendar"></i>20 Enero 2020</p>
                    </div>

                </div>
                <!--Talleres-->>
            </div>
            <!--Programa eventos-->
        </div>
        <!--COntenedor-->
    </div>
    <!--programa-->
</section>

<section class="invitados contenedor seccion">
    <h2>Servicios</h2>
    <ul class="lista-invitados clearfix">

        @foreach($Servicios as $servicio)
        @if($servicio['EST_SERVICIO']== 1 )
        <li>
            <div class="invitado">
                <img src="/storage/{{$servicio['IMG_SERVICIO']}}" />
                <p>{{$servicio['TIP_SERVICIO']}} - ${{$servicio['COST_SERVICIO']}} </p>
            </div>
        </li>

        @endif
        @endforeach
    </ul>
</section>

<div class=" contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <img src="/public/img/car.webp" alt="">

        </ul>
    </div>
</div>


</div>
<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">

        @foreach($ArrayTestimoniales as $Testimonio)
        <div class="testimonial">
            <blockquote>
                <p>{{$Testimonio['DES_TESTIMONIAL']}} </p>
                <footer class="info-testimoniales">
                    <img src="img/testimonial.jpg" alt="">
                    <cite> {{$Testimonio['name']}}
                        <span> {{$Testimonio['USER_TESTIMONIAL']}} </span>
                    </cite>
                </footer>
            </blockquote>

        </div>
        @endforeach


        <!--Fin testimoniales-->
    </div>

</section>

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <h3>CarwashHN</h3>
    </div>
</div>
<!--Fin del newsletter-->



<section class="seccion">
    <h2>Localízanos</h2>
    <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">

            <img src="/public/img/car.webp" alt="">
        </ul>
    </div>
</section>


<div id="mapa" class="mapa">

</div>


<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion tres ">
            <h3>sobre <span>CarwhashHN</span></h3>
            <p>Somos una empresa que ofrece el servicio de auto lavado rápida de manera eficiente y económica, con los mejores servicios, promociones y el mejor equipo de auto lavado existente, además de un trato personal brindado por nuestro personal capacitado basados en la honestidad, confianza y responsabilidad.</p>
        </div>
        <div class="ultimos-tweets tres">
            <h3> <span>Contactenos</span></h3>
            <ul>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam eum ab commodi alias fugit. Esse!</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam eum ab commodi alias fugit. Esse!</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam eum ab commodi alias fugit. Esse!</li>
            </ul>
        </div>
        <div class="menu tres">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-pinterest-p"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </nav>
        </div>

    </div>
    <div class="copy">
        <p>Todos los derechos Reservados CARWASHHN 2021 &copy;</p>
    </div>
</footer>



@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script>
    async function LongitudFuncion() {
        const Respuesta = await fetch('http://18.190.134.17:4000/direccionGPS/3');
        const Longitud = await Respuesta.json();
        const D_longitud = Longitud.map(x => x.DES_SEGURIDAD)
        const retornar = parseFloat(D_longitud);
        console.log(retornar)
        return retornar;
    }
    async function LatitudFuncion() {
        const Respuesta = await fetch('http://18.190.134.17:4000/direccionGPS/2');
        const Latitud = await Respuesta.json();
        const D_latitud = Latitud.map(x => x.DES_SEGURIDAD)
        const retornar = parseFloat(D_latitud);
        console.log(retornar)
        return retornar;
    }

    document.addEventListener('DOMContentLoaded', async () => {


        const lng1 = await LongitudFuncion();
        const lat1 = await LatitudFuncion();

        const lat = lat1;

        const lng = lng1;
        const map = L.map('mapa').setView([lat, lng], 6);

        const enlaceMapa = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

        map.setZoom(15);
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + enlaceMapa + ' Contributors',
                maxZoom: 18,
                tileSize: 512,
                zoomOffset: -1,
            }).addTo(map);

        setInterval(function() {
            map.setZoom(15);
            setTimeout(function() {
                map.setZoom(17);
            }, 2000);
        }, 4000);

        let maker;
        maker = new L.maker([lat, lng]).addTo(map)



    })
</script>

@endsection