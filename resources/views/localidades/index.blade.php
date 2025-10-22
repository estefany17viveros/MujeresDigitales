@extends('layout')

@section('content')
<h2>🏟️ Lista de Localidades</h2>
<a href="{{ route('localidades.create') }}" class="btn btn-success mb-3">Agregar Localidad</a>

<table class="table table-striped table-bordered">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Nombre de Localidad</th>
            <th>Boleta Asociada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($localidades as $localidad)
        <tr>
            <td>{{ $localidad->id }}</td>
            <td>{{ $localidad->name }}</td>
            <td>{{ $localidad->boleta_id ?? 'No asignada' }}</td>
            <td>
                <a href="{{ route('localidades.show', $localidad->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('localidades.edit', $localidad->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('localidades.destroy', $localidad->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
