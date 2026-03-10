@extends('layouts.master')

@section('title', 'Contador de Actores')

@section('content')
    <h1 class="mt-4">Total Actores</h1>
    <br>
    <p>Hay <strong>{{ $count ?? 0 }}</strong> actores registrados.</p>
@endsection

@section('footer')
@endsection
