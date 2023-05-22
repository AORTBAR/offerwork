<!DOCTYPE html>
<html>
<head>
    <title>Listado de Empresas</title>
    @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Listado de Ofertas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Salario</th>
                <th>Empresa ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->id }}</td>
                    <td>{{ $oferta->titulo }}</td>
                    <td>{{ $oferta->descripcion }}</td>
                    <td>{{ $oferta->salario }}</td>
                    <td>{{ $oferta->empresa_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>