@section('content')
<h2>Detalles del Evento</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> {{ $evento->nombre }}</li>
    <li class="list-group-item"><strong>Descripción:</strong> {{ $evento->descripcion }}</li>
    <li class="list-group-item"><strong>Inicio:</strong> {{ $evento->fecha_inicio }}</li>
    <li class="list-group-item"><strong>Fin:</strong> {{ $evento->fecha_fin }}</li>
    <li class="list-group-item"><strong>Lugar:</strong> {{ $evento->lugar }}</li>
</ul>

<a href="{{ route('eventos.index') }}" class="btn btn-secondary mt-3">Volver</a>

<style>
/* Contenedor general */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f8f9fa;
    padding: 30px;
}

/* Título */
h2 {
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    background: linear-gradient(90deg, #FFD700 33%, #0033A0 33%, #0033A0 66%, #CE1126 66%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
}

/* Lista de detalles */
.list-group {
    max-width: 600px;
    margin: auto;
}

.list-group-item {
    background: #ffffff;
    border-left: 5px solid #FFD700;
    border-radius: 8px;
    margin-bottom: 10px;
    padding: 12px 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.list-group-item strong {
    color: #0033A0;
}

/* Botón volver */
.btn-secondary {
    display: block;
    max-width: 200px;
    margin: 20px auto 0 auto;
    background: #6c757d;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    text-align: center;
    transition: background 0.3s, transform 0.2s;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: scale(1.05);
}
</style>
