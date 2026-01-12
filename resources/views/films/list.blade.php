@extends('layouts.master')

@section('title', $title ?? 'Lista de Películas')

@section('content')
    <h1 class="mt-4">{{ $title }}</h1>

    @if(empty($films))
        <div class="alert alert-warning">No se ha encontrado ninguna película</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Género</th>
                        <th>Imagen</th>
                        <th>País</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{ $film['name'] }}</td>
                            <td>{{ $film['year'] }}</td>
                            <td>{{ $film['genre'] }}</td>
                            <td><img src="{{ $film['img_url'] }}" class="img-thumbnail" style="max-width:100px; height:auto;" alt="{{ $film['name'] }}" /></td>
                            <td>{{ $film['country'] }}</td>
                            <td>{{ $film['duration'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

@section('footer')
@endsection