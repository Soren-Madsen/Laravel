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
@endsection

@section('footer')
    <!-- Optional per-page footer -->
@endsection
    
