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
            <h1 class="mt-4">Lista de Actores</h1>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('actors') }}">Listado de actores</a></li>
            </ul>

            <h2 class="mt-4">Buscar actores por década</h2>
            <form method="GET">
                <div class="form-group">
                    <label for="decade">Selecciona una década:</label>
                    <select id="decade" name="decade" class="form-control" required onchange="this.form.action='{{ url('actorout/listActorsByDecade') }}/' + this.value;">
                        <option value="">-- Selecciona una década --</option>
                        <option value="1950">1950s (1950-1959)</option>
                        <option value="1960">1960s (1960-1969)</option>
                        <option value="1970">1970s (1970-1979)</option>
                        <option value="1980">1980s (1980-1989)</option>
                        <option value="1990">1990s (1990-1999)</option>
                        <option value="2000">2000s (2000-2009)</option>
                        <option value="2010">2010s (2010-2019)</option>
                        <option value="2020">2020s (2020-2029)</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buscar Actores</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
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
    
