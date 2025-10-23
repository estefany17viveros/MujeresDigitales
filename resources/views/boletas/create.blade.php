<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Boleta - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #FCD116, #003893, #CE1126); }
        .form-container { margin: 50px auto; width: 400px; background: white; padding: 20px; border-radius: 15px; }
        .btn-colombia { background-color: #003893; color: white; }
        .btn-colombia:hover { background-color: #CE1126; }
    </style>
</head>
<body>
<div class="form-container">
    <h3 class="text-center mb-4">Crear Boleta</h3>
    <form action="{{ route('boletas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Evento</label>
            <select name="evento_id" class="form-control" required>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Localidad</label>
            <select name="localidad_id" class="form-control" required>
                @foreach($localidades as $localidad)
                    <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Valor</label>
            <input type="number" name="valor" class="form-control" min="0" required>
        </div>
        <div class="mb-3">
            <label>Cantidad Disponible</label>
            <input type="number" name="cantidad_disponible" class="form-control" min="0" required>
        </div>
        <button class="btn btn-colombia w-100">Guardar Boleta</button>
    </form>
</div>
</body>
</html>
