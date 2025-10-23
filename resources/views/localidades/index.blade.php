<h2>Localidades</h2>
<a href="{{ route('localidades.create') }}">Crear Localidad</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    @foreach($localidades as $localidad)
    <tr>
        <td>{{ $localidad->id }}</td>
        <td>{{ $localidad->nombre }}</td>
    </tr>
    @endforeach
</table>
