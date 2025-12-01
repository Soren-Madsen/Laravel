@extends('layouts.master')

@section('title', $title ?? 'Lista de Películas')

@section('content')
    <h1>{{ $title }}</h1>

    @if(empty($films))
        <span style="color:red">No se ha encontrado ninguna película</span>
    @else
        <div class="text-center">
            <table class="table table-bordered table-sm mx-auto" style="width: auto;">
                <thead>
                    <tr>
                        @foreach($films as $film)
                            @foreach(array_keys($film) as $key)
                                <th>{{ $key }}</th>
                            @endforeach
                            @break
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{ $film['name'] }}</td>
                            <td>{{ $film['year'] }}</td>
                            <td>{{ $film['genre'] }}</td>
                            <td><img src="{{ $film['img_url'] }}" style="width: 100px; height: 120px;" alt="img" /></td>
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