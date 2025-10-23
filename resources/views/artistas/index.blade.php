<h2>Artistas</h2>
<a href="{{ route('artistas.create') }}">Crear Artista</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Género</th>
        <th>Ciudad Natal</th>
    </tr>
    @foreach($artistas as $artista)
    <tr>
        <td>{{ $artista->id }}</td>
        <td>{{ $artista->nombres }}</td>
        <td>{{ $artista->apellidos }}</td>
        <td>{{ $artista->genero }}</td>
        <td>{{ $artista->ciudad_natal }}</td>
    </tr>
    @endforeach
</table>
