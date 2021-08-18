@extends('adminlte::page')

@section('title','Estadistica')

@section('content')
<div class="container">
    <h2 class="text-center">Estadísticas</h2>
    <div class="row col-6">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div>
<div class="container">
    <div class="row col-6">
        <canvas id="myChart1" width="400" height="400"></canvas>
    </div>
</div>





<script>
    const chart1 = async () => {

        const dia = await fetch('http://localhost:3000/estadistica/dia');

        const grafica = await dia.json();
        const grafica2 = await grafica;
        const fecha = grafica2.map(x => x.DIA);
        const cantidad = grafica2.map(x => x.RESULTADO);
        RegitroDia = fecha;
        CantidadDia = cantidad;
        console.log(RegitroDia, CantidadDia)



        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Registros dia',
                    data: cantidad,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Personas registradas por día'
                    }
                }
            }
        });


    }
    chart1();





    const chart = async () => {

        const dia = await fetch('http://localhost:3000/estadistica/mes');

        const grafica = await dia.json();
        const grafica2 = await grafica;
        const fecha = grafica2.map(x => x.MES);
        const cantidad = grafica2.map(x => x.RESULTADO);
        RegitroDia = fecha;
        CantidadDia = cantidad;
        console.log(RegitroDia, CantidadDia)



        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Registros dia',
                    data: cantidad,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Personas registradas por día'
                    }
                }
            }
        });


    }
    chart();
</script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>