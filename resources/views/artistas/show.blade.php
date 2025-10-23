<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Boleta - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #FCD116, #003893, #CE1126); }
        .detail-container { margin: 50px auto; width: 400px; background: white; padding: 20px; border-radius: 15px; }
        .btn-colombia { background-color: #003893; color: white; }
        .btn-colombia:hover { background-color: #CE1126; }
    </style>
</head>
<body>
<div class="detail-container">
    <h3 class="text-center mb-4">Detalle de Boleta</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $boleta->id }}</li>
        <li class="list-group-item"><strong>Evento:</strong> {{ $boleta->evento->nombre }}</li>
        <li class="list-group-item"><strong>Localidad:</strong> {{ $boleta->localidad->nombre }}</li>
        <li class="list-group-item"><strong>Valor:</strong> {{ $boleta->valor }}</li>
        <li class="list-group-item"><strong>Cantidad Disponible:</strong> {{ $boleta->cantidad_disponible }}</li>
    </ul>
    <a href="{{ route('boletas.edit', $boleta->id) }}" class="btn btn-colombia mt-3 w-100">Editar Boleta</a>
    <a href="{{ route('boletas.index') }}" class="btn btn-secondary mt-2 w-100">Volver a la lista</a>
</div>
</body>
</html>
