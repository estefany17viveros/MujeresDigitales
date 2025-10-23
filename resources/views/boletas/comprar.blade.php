<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar Boleta - Colombia App</title>
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
    <h3 class="text-center mb-4">Comprar Boleta</h3>
    <p><strong>Evento:</strong> {{ $boleta->evento->nombre }}</p>
    <p><strong>Localidad:</strong> {{ $boleta->localidad->nombre }}</p>
    <p><strong>Valor Unitario:</strong> {{ $boleta->valor }}</p>
    <p><strong>Cantidad Disponible:</strong> {{ $boleta->cantidad_disponible }}</p>

    <form action="{{ route('boletas.pagar', $boleta->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cantidad a Comprar</label>
            <input type="number" name="cantidad" class="form-control" min="1" max="{{ $boleta->cantidad_disponible }}" required>
        </div>
        <div class="mb-3">
            <label>Método de Pago</label>
            <select name="metodo_pago" class="form-control" required>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Transferencia">Transferencia</option>
            </select>
        </div>
        <button class="btn btn-colombia w-100">Comprar</button>
    </form>
    <a href="{{ route('boletas.index') }}" class="btn btn-secondary mt-3 w-100">Volver a la lista</a>
</div>
</body>
</html>
