@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear nueva oferta</h1>

        <form action="{{ route('ofertas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" class="form-control" id="salario" name="salario" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="mb-3">
                <label for="empresaid" class="form-label">EmpresaID</label>
                <input type="number" class="form-control" id="empresa_id" name="empresa_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear oferta</button>
        </form>

        <div class="mt-3">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Volver al panel</a>
        </div>
    </div>
@endsection