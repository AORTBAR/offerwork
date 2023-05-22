@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Empresas</h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->mail }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a class="btn btn-primary" href="{{ route('empresas.edit', $empresa->id) }}">Editar</a>
                                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
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
                {{ $empresas->links('pagination::bootstrap-5') }}
                <div class="mt-3">
                    <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver</a>
                    <a href="{{ route('empresas.pdf') }}" class="btn btn-primary">Listar PDF</a>
                    <form action="{{ route('empresas.create') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Crear Empresa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection