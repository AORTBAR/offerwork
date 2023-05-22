@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
  <div class="container">
    <h1 class="mb-4">Lista de Usuarios</h1>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <div class="d-flex">
                <a href="{{ route('users.update', $user->id) }}" class="btn btn-primary me-2">Editar</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-between">
      <form action="{{ route('register.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-success">Crear Usuario</button>
      </form>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
      </form>
    </div>
    <div class="d-flex justify-content-center mt-3">
      {{ $users->links() }}
    </div>
    <div class="col-md-12">
      <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Volver al Panel</button>
      </form>
    </div>
  </div>
@endsection