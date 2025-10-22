@extends('layout')

@section('content')
<h2>Detalles del Artista</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $artista->id }}</li>
    <li class="list-group-item"><strong>Género:</strong> {{ $artista->genero }}</li>
    <li class="list-group-item"><strong>Ciudad Natal:</strong> {{ $artista->ciudad }}</li>
</ul>
<a href="{{ route('artistas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
