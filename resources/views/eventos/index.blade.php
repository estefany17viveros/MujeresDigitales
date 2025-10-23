<h2>Eventos Disponibles</h2>
<a href="{{ route('eventos.create') }}">Crear Evento</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Lugar</th>
        <th>Acciones</th>
    </tr>
    @foreach($eventos as $evento)
    <tr>
        <td>{{ $evento->id }}</td>
        <td>{{ $evento->nombre }}</td>
        <td>{{ $evento->descripcion }}</td>
        <td>{{ $evento->fecha_hora_inicio }}</td>
        <td>{{ $evento->fecha_hora_fin }}</td>
        <td>{{ $evento->lugar }}</td>
        <td>
            <a href="{{ route('eventos.edit', $evento) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</table>
