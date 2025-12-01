@extends('layouts.master')

@section('title', 'Contador de Películas')

@section('content')
    <h1 class="mt-4">Total Películas</h1>
    <br>
    <p>Hay <strong>{{ $count ?? 0 }}</strong> películas en el catálogo.</p>
@endsection

@section('footer')
@endsection
</head>
