@extends('layouts.ofertascreate')

@section('ofertascreate-content')
    <form action="{{ route('ofertas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="text" class="form-control" id="salario" name="salario" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
        </div>
        

        <!-- Agrega aquí los demás campos del formulario según tus necesidades -->

        <button type="submit" class="btn btn-primary">Crear oferta</button>
    </form>
@endsection