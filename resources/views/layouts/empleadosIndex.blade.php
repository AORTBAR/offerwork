<!DOCTYPE html>
<html>

<head>
    <title>Panel de Administración de Empleados</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApo80QjQo79dZl0KC_FXhOiI8EuBAKOBs"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });
        }

        // Llama a la función initMap cuando el DOM esté completamente cargado
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <div id="mensaje-empresa"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Estilos CSS personalizados para el layout */
    </style>
</head>


<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Agrega aquí el contenido del menú de navegación -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configuración</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <!-- Menú lateral de navegación -->

            </div>
            <div class="col-lg-10">
                <!-- Contenido principal de la página -->
                @yield('content')
            </div>
        </div>
    </div>
    

    <footer>
        <!-- Agrega aquí el contenido del pie de página -->
        <div class="container">
            <p>Pie de página</p>
        </div>
    </footer>

    <!-- Scripts -->
    @yield('scripts')
</body>

</html>