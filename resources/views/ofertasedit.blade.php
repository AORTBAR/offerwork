@extends('layouts.ofertasedit')

@section('ofertasedit-content')
    <div class="container">
        <h1>Editar oferta</h1>

        <form action="{{ route('ofertas.update', ['id' => $oferta->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $oferta->titulo }}">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{ $oferta->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection