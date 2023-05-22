@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Empresa</h1>
        <hr>

        <form action="{{ route('empresas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Id:</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Empresa:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Mail:</label>
                <input type="text" class="form-control" id="mail" name="mail">
            </div>
            <!-- Agrega aquí más campos del formulario de creación de empresas -->

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Crear Empresa</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
@endsection