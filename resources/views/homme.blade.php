@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h1 class="text-5xl text-center mb-5">Bienvenido</h1>

    <div class="d-flex justify-content-center">
        <a href="{{ route('login.index') }}" class="btn btn-secondary btn-sm me-3">Iniciar Sesión</a>
        <a href="{{ route('register.create') }}" class="btn btn-secondary btn-sm">Registrarse</a>
    </div>
</div>

<div id="total-ofertas"></div>

<!-- Modal de aceptación de cookies -->
<div id="cookie-modal" class="fixed top-0 left-0 right-0 bottom-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded p-5">
        <h2 class="text-2xl mb-3">Política de cookies</h2>
        <p>Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. Al continuar navegando, aceptas nuestra política de cookies.</p>
        <button id="accept-cookies" class="btn btn-primary mt-3">Aceptar</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('total-ofertas') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $('#total-ofertas').text('Total de ofertas: ' + response.total);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        // Verificar si la cookie de aceptación existe
        var acceptedCookies = Cookies.get('cookiesAccepted');

        if (!acceptedCookies) {
            // Mostrar el modal de aceptación de cookies
            $('#cookie-modal').show();

            // Bloquear el clic en los botones de inicio de sesión y registro
            $('.btn-secondary').click(function(e) {
                e.preventDefault();
            });
        } else { $('#cookie-modal').hide();

        }

        // Manejar el evento de clic en el botón de aceptar cookies
        $('#accept-cookies').click(function() {
            // Establecer la cookie de aceptación con una duración de 30 días
            Cookies.set('cookiesAccepted', true, { expires: 30 });

            // Ocultar el modal de aceptación de cookies
            $('#cookie-modal').hide();

            // Desbloquear el clic en los botones de inicio de sesión y registro
            $('.btn-secondary').off('click');
        });
    });
</script>
@endsection