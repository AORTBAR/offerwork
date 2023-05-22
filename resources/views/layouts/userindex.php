<!DOCTYPE html>
<html>
<head>
    <title>Lista de usuarios</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        obtenerEmpresaConMasOfertas();

        setInterval(function() {
            obtenerEmpresaConMasOfertas();
        }, 5000); // Actualizar cada 5 segundos

        function obtenerEmpresaConMasOfertas() {
            $.ajax({
                url: "{{ route('ofertas.empresa-con-mas-ofertas') }}",
                method: "GET",
                success: function(response) {
                    $('#empresa-con-mas-ofertas').text(response.nombre);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
    });
</script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
