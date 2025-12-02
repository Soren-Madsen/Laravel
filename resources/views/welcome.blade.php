@extends('layouts.master')

@section('title', 'Lista de Películas')

@section('header')
    <!-- Optional per-page header -->
@endsection

@section('content')
    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href="/filmout/oldFilms">Pelis antiguas</a></li>
        <li><a href="/filmout/newFilms">Pelis nuevas</a></li>
        <li><a href="/filmout/films/year">Pelis por año</a></li>
        <li><a href="/filmout/films/genre">Pelis por género</a></li>
        <li><a href="/filmout/films/count">Contador de pelis</a></li>
        <li><a href="/filmout/films/sort/year">Pelis ordenadas por año</a></li>
    </ul>

    <h2 class="mt-4">Añadir nueva película</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('createFilm') }}">
        <div>
            <label for="title">Nombre</label>
            <input id="title" name="title" type="text" required>
        </div>
        <div>
            <label for="year">Año</label>
            <input id="year" name="year" type="number" required>
        </div>
        <div>
            <label for="genre">Género</label>
            <input id="genre" name="genre" type="text" required>
        </div>
        <div>
            <label for="pais">País</label>
            <input id="pais" name="pais" type="text" required>
        </div>
        <div>
            <label for="duracion">Duración</label>
            <input id="duracion" name="duracion" type="text" required>
        </div>
        <div>
            <label for="img_url">Imagen URL</label>
            <input id="img_url" name="img_url" type="url" required>
        </div>
        <div>
            <button type="submit">Añadir Película</button>
        </div>
    </form>
@endsection

@section('footer')
    <!-- Optional per-page footer -->
@endsection
    
