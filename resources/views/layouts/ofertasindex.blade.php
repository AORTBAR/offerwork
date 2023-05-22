<div class="container">
    
    <h1>Listado de Ofertas</h1>

    @if ($ofertas->isEmpty())
    <p>No se encontraron ofertas.</p>
    @else
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Título</th>
                <th>Salario</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas as $oferta)
            <tr>
                <td>{{ $oferta->titulo }}</td>
                <td>{{ $oferta->salario }}</td>
                <td>{{ $oferta->descripcion }}</td>
                <td>
                    <form action="{{ route('ofertas.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="ID">Título:</label>
                            <input type="text" name="id" id="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="salario">Salario:</label>
                            <input type="number" name="salario" id="salario" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="empresa_id">Empresa ID:</label>
                            <input type="number" name="empresa_id" id="empresa_id" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Crear</button>
                    </form>


                    <a href="{{ route('ofertas.update', $oferta->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="d-flex justify-content-center" aria-label="Paginación">
        {{ $ofertas->links() }}
    </nav>
    @endif

    <div class="mt-3">
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver</a>
    </div>
</div>
