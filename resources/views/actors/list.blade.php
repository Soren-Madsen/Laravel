@extends('layouts.master')

@section('title', $title ?? 'Lista de Actores')

@section('content')
    <h1 class="mt-4">{{ $title }}</h1>

    @if($actors->isEmpty())
        <div class="alert alert-warning">No se ha encontrado ningún actor</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actors as $actor)
                        <tr>
                            <td>{{ $actor->name }}</td>
                            <td>{{ $actor->surname }}</td>
                            <td>{{ $actor->birthdate ? $actor->birthdate->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $actor->country }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

@section('footer')
@endsection
