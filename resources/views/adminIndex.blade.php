@extends('layouts.adminIndex')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Menú lateral de navegación -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <form action="{{ route('users.index') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="font-size: 18px;">Usuarios</button>
            </form>
          </li>
          <li class="nav-item">
            <form action="{{ route('empresas.index') }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="font-size: 18px;">Empresas</button>
            </form>
          </li>
          <li class="nav-item">
            <form action="" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="font-size: 18px;">Roles</button>
            </form>
          </li>
          <li class="nav-item">
            <form action="{{ route('ofertas.index') }}" method="get">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="font-size: 18px;">Ofertas</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Contenido principal -->
    <main role="main" class="col-md-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @auth
          <h1 class="h2">Bienvenido, {{ Auth::user()->name }}</h1>
        @endauth
        <div class="btn-toolbar mb-2 mb-md-0">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              
            </div>
            <div class="card-body">
              <div class="weather-data">
                <h2>Clima en {{ $weatherData['name'] }}</h2>
                <ul>
                  <li>Temperatura: {{ $weatherData['main']['temp'] }}°C</li>
                  <li>Presión atmosférica: {{ $weatherData['main']['pressure'] }} hPa</li>
                  <li>Humedad: {{ $weatherData['main']['humidity'] }}%</li>
                  <li>Viento: {{ $weatherData['wind']['speed'] }} m/s</li>
                  <li>Descripción: {{ $weatherData['weather'][0]['description'] }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection