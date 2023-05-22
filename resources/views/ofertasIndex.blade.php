@extends('layouts.app')

@section('content')
<div id="empresa-con-mas-ofertas"></div>

    <div class="container">
        <h1>Listado de Ofertas</h1>

        @if ($ofertas->isEmpty())
            <p>No se encontraron ofertas.</p>
        @else
            <div class="table-responsive">
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
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('ofertas.edit', $oferta->id) }}" class="btn btn-success btn-sm">Editar</a>
                                    
                                        <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Paginación">
                <ul class="pagination">
                    @if ($ofertas->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $ofertas->previousPageUrl() }}">Anterior</a>
                        </li>
                    @endif

                    @foreach ($ofertas as $oferta)
                        <li class="page-item">
                            <a class="page-link" href="{{ $oferta->url }}">{{ $oferta->label }}</a>
                        </li>
                    @endforeach

                    @if ($ofertas->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $ofertas->nextPageUrl() }}">Siguiente</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Siguiente</span>
                        </li>
                    @endif
                </ul>
            </nav>

            <div class="mt-3">
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver</a>
                <a href="{{ route('ofertas.create') }}" class="btn btn-primary">Crear Oferta</a>
                <a href="{{ route('ofertas.pdf') }}" class="btn btn-primary">Listar Ofertas en PDF</a>
            </div>
        @endif
    </div>
@endsection