@extends('layouts.adminIndex')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Menú lateral de navegación -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.empresas.index') }}">Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.ofertas.index') }}">Ofertas</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Contenido principal -->
    <main role="main" class="col-md-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Empresa</h1>
      </div>

      <!-- Contenido del formulario de edición -->
      <div class="row">
        <div class="col-md-6 offset-md-3">
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
      </div>
    </main>
  </div>
</div>
@endsection