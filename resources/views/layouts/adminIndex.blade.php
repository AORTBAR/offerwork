@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        obtenerEmpresaMayorOfertas();
    });

    function obtenerEmpresaMayorOfertas() {
        $.ajax({
            url: '/empresas/mayor-ofertas',
            type: 'GET',
            success: function(response) {
                if (response) {
                    var mensaje = 'La empresa con más ofertas publicadas es: ' + response.nombre;
                    $('#mensaje-empresa').text(mensaje);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
</script>

<style>
    #map {
        width: 400px;
        height: 400px;
        float: left;
        margin-right: 20px;
    }

    #weather-data {
        float: left;
    }
</style>

<div id="weather-data">
    <!-- Aquí se mostrarán los datos del clima -->
</div>



