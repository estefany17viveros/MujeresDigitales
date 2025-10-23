<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boletas - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #FCD116, #003893, #CE1126); }
        .table-container { margin: 50px auto; width: 90%; background: white; padding: 20px; border-radius: 15px; }
        .btn-colombia { background-color: #003893; color: white; }
        .btn-colombia:hover { background-color: #CE1126; }
    </style>
</head>
<body>
<div class="table-container">
    <h2 class="text-center mb-4">Boletas</h2>
    <a href="{{ route('boletas.create') }}" class="btn btn-colombia mb-3">Crear Boleta</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Localidad</th>
                <th>Valor</th>
                <th>Cantidad Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boletas as $boleta)
            <tr>
                <td>{{ $boleta->id }}</td>
                <td>{{ $boleta->evento->nombre }}</td>
                <td>{{ $boleta->localidad->nombre }}</td>
                <td>{{ $boleta->valor }}</td>
                <td>{{ $boleta->cantidad_disponible }}</td>
                <td>
                    <a href="{{ route('boletas.show', $boleta->id) }}" class="btn btn-sm btn-colombia">Ver</a>
                    <a href="{{ route('boletas.edit', $boleta->id) }}" class="btn btn-sm btn-colombia">Editar</a>
                    <form action="{{ route('boletas.destroy', $boleta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
