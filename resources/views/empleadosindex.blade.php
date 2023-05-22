@extends('layouts.empleadosIndex')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @auth
            <h1 class="h2">Bienvenido, {{ Auth::user()->name }}</h1>
            @endauth

            <!-- Agrega aquí el encabezado de tu panel de administración -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div id="rankingEmpresasChart" style="width: 600px; height: 400px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div id="map" style="width: 600px; height: 400px;"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Empresa', 'Ofertas'],
            @foreach($empresas as $empresa)
            ['{{ $empresa->nombre }}', {{ $empresa->ofertas_count }}],
            @endforeach
        ]);

        var options = {
            title: 'Ranking de Empresas por Ofertas',
            width: 600,
            height: 400
        };

        var chart = new google.visualization.PieChart(document.getElementById('rankingEmpresasChart'));
        chart.draw(data, options);
    }

    $(document).ready(function() {
        function actualizarDatosGrafico() {
            $.ajax({
                url: '{{ route("actualizarDatosGrafico") }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = google.visualization.arrayToDataTable(response);

                    var options = {
                        title: 'Ranking de Empresas por Ofertas',
                        width: 600,
                        height: 400
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('rankingEmpresasChart'));
                    chart.draw(data, options);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        setInterval(actualizarDatosGrafico, 5000); // Actualizar cada 5 segundos
    });
</script>
@endsection