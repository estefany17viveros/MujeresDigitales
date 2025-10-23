<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Detalle de compra</title>
<style>
body{font-family:Arial;background:#f7f7f7;margin:0;padding:0;}
nav{background:linear-gradient(90deg,#FFD700,#0033A0,#CE1126);padding:12px;color:#fff;}
.container{max-width:700px;margin:25px auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.1);}
dl{display:grid;grid-template-columns:150px 1fr;gap:8px 20px;}
</style>
</head>
<body>
<nav>Comprobante de compra</nav>
<div class="container">
    <h2>Compra #{{ $compra->id }}</h2>
    <dl>
        <dt>Evento:</dt><dd>{{ $compra->boleta->evento->nombre ?? 'N/A' }}</dd>
        <dt>Localidad:</dt><dd>{{ $compra->boleta->localidad->nombre ?? 'N/A' }}</dd>
        <dt>Cantidad:</dt><dd>{{ $compra->cantidad }}</dd>
        <dt>Valor total:</dt><dd>${{ number_format($compra->valor_total, 2) }}</dd>
        <dt>Método pago:</dt><dd>{{ $compra->metodo_pago }}</dd>
        <dt>Documento:</dt><dd>{{ $compra->documento }}</dd>
        <dt>Estado:</dt><dd>{{ ucfirst($compra->estado) }}</dd>
        <dt>Fecha:</dt><dd>{{ $compra->created_at->format('d/m/Y H:i') }}</dd>
    </dl>
    <p><a href="{{ route('compras.index') }}">Volver al historial</a></p>
</div>
</body>
</html>
