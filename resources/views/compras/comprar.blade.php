<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Comprar boletas</title>
<style>
body{font-family:Arial, sans-serif;background:#f7f7f7;margin:0;padding:0;}
nav{background:linear-gradient(90deg,#FFD700,#0033A0,#CE1126);padding:12px 20px;color:#fff;}
.container{max-width:600px;margin:30px auto;background:#fff;padding:20px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);}
label{display:block;margin-top:10px;font-weight:bold;}
input,select{width:100%;padding:8px;margin-top:6px;border-radius:6px;border:1px solid #ccc;}
button{background:#0033A0;color:#fff;padding:10px 15px;border:none;border-radius:6px;cursor:pointer;margin-top:12px;}
.error{color:#c0392b;}
.success{color:green;}
</style>
</head>
<body>
<nav>Boletas - Comprar</nav>
<div class="container">
    <h2>Comprar boletas - {{ $boleta->evento->nombre }}</h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <p><strong>Localidad:</strong> {{ $boleta->localidad->nombre }}</p>
    <p><strong>Valor por boleta:</strong> ${{ number_format($boleta->valor, 2) }}</p>
    <p><strong>Disponibles:</strong> {{ $boleta->cantidad_disponible }}</p>

    <form action="{{ route('compras.store', $boleta->id) }}" method="POST">
        @csrf
        <label>Número de documento</label>
        <input type="text" name="documento" value="{{ old('documento') }}" required>

        <label>Cantidad (máx 10)</label>
        <input type="number" name="cantidad" min="1" max="10" value="{{ old('cantidad', 1) }}" required>

        <label>Método de pago (número tarjeta - 15 dígitos)</label>
        <input type="text" name="metodo_pago" maxlength="15" value="{{ old('metodo_pago') }}" required>

        <button type="submit">Pagar</button>
    </form>
</div>
</body>
</html>
