@extends('layouts.master')

@section('title', 'Lista de Películas')

@section('header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="mt-4">Lista de Peliculas</h1>
            <ul class="list-group">
                <li class="list-group-item"><a href="/filmout/oldFilms">Pelis antiguas</a></li>
                <li class="list-group-item"><a href="/filmout/newFilms">Pelis nuevas</a></li>
                <li class="list-group-item"><a href="/filmout/films/year">Pelis por año</a></li>
                <li class="list-group-item"><a href="/filmout/films/genre">Pelis por género</a></li>
                <li class="list-group-item"><a href="/filmout/films/count">Contador de pelis</a></li>
                <li class="list-group-item"><a href="/filmout/films/sort/year">Pelis ordenadas por año</a></li>
            </ul>
        </div>

        <div class="col-md-6">
            <h2 class="mt-4">Añadir nueva película</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (isset($success))
                <div class="alert alert-success">{{ $success }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @elseif (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form method="POST" action="{{route('film')}}">
                @csrf
                <div class="form-group">
                    <label for="title">Nombre</label>
                    <input id="title" name="name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="year">Año</label>
                    <input id="year" name="year" type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="genre">Género</label>
                    <input id="genre" name="genre" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input id="pais" name="country" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="duracion">Duración</label>
                    <input id="duracion" name="duration" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="img_url">Imagen URL</label>
                    <input id="img_url" name="img_url" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Añadir Película</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
@endsection
    
