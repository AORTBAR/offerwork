@extends('layouts.empresasEdit')

@section('content')
<div class="container">
  <h1>Editar Empresa</h1>
  <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nombre">Nombre de la empresa</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empresa->nombre }}" required>
    </div>
    <div class="form-group">
      <label for="direccion">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $empresa->direccion }}" required>
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $empresa->telefono }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>
@endsection