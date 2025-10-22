@extends('layout')

@section('content')
<h2>🎵 Lista de Artistas</h2>
<a href="{{ route('artistas.create') }}" class="btn btn-success mb-3">Agregar Artista</a>

<table class="table table-striped table-bordered">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Género</th>
            <th>Ciudad Natal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($artistas as $artista)
        <tr>
            <td>{{ $artista->id }}</td>
            <td>{{ $artista->genero }}</td>
            <td>{{ $artista->ciudad }}</td>
            <td>
                <a href="{{ route('artistas.show', $artista->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('artistas.edit', $artista->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('artistas.destroy', $artista->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
