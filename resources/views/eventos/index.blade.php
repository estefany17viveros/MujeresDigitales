<<<<<<< HEAD
@section('content')
<h2>📅 Lista de Eventos</h2>
<a href="{{ route('eventos.create') }}" class="btn btn-success mb-3">Agregar Evento</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventos as $evento)
        <tr>
            <td>{{ $evento->id }}</td>
            <td>{{ $evento->nombre }}</td>
            <td>{{ $evento->descripcion }}</td>
            <td>{{ $evento->fecha_inicio }}</td>
            <td>{{ $evento->fecha_fin }}</td>
            <td>{{ $evento->lugar }}</td>
            <td>
                <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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

/* Botón Agregar Evento */
.btn-success {
    background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
    border: none;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.2s, background 0.3s;
}

.btn-success:hover {
    background: linear-gradient(90deg, #FFEC70, #3357FF, #FF4B4B);
    transform: scale(1.05);
}

/* Tabla */
.table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    margin-top: 15px;
}

/* Encabezado de la tabla */
.table thead {
    background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
    color: white;
}

.table th, .table td {
    padding: 12px 15px;
    text-align: left;
}

/* Filas alternas */
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f3f3f3;
}

/* Bordes */
.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
}

/* Botones dentro de la tabla */
.btn-info, .btn-primary, .btn-danger {
    font-size: 0.85em;
    padding: 5px 10px;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: none;
}

.btn-info {
    background: #0033A0;
    color: white;
}
.btn-info:hover {
    background: #001f70;
}

.btn-primary {
    background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
    color: white;
}
.btn-primary:hover {
    background: linear-gradient(90deg, #FFEC70, #3357FF, #FF4B4B);
}

.btn-danger {
    background: #CE1126;
    color: white;
}
.btn-danger:hover {
    background: #a01020;
}
</style>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Eventos disponibles</title>
</head>
<body>
    
</body>
</html>
    <header class="encabezado">
        <nav>
            <img src="{{ asset('image/logo.png') }}" alt="">
            <button class="inicio">Iniciar sesión</button>
        </nav>
        <main>
            <h1>¡Vive las Ferias de Colombia!</h1>
            <p>Descubre los mejores eventos y ferias colombianas. Compra tus boletos de forma fácil y segura.</p>
        </main>
    </header>
<div class="container">

    <div class="table-container">
        <h1>Listado de Eventos</h1>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('eventos.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Registrar Nuevo Evento</a>
        <table style="border-radius: 10px;">
            <thead>
                <tr>
                    <th style="border-top-left-radius: 10px;">Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Lugar</th>
                    <th>Artista</th>
                    <th>Localidad</th>
                    <th style="border-top-right-radius: 10px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->nombre }}</td>
                        <td>{{ $evento->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}</td>
                        <td>{{ $evento->lugar }}</td>
                        <td>{{ $evento->artista->genero ?? 'N/A' }} - {{ $evento->artista->ciudad ?? 'N/A' }}</td>
                        <td>{{ $evento->localidad->nombre ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('eventos.show', $evento) }}" class="btn btn-success">
                                <img src="{{ asset('image/ojo.png') }}" alt="show">
                            </a>
                            <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-warning">
                                <img src="{{ asset('image/actualizar.png') }}" alt="show">
                            </a>
                            <form action="{{ route('eventos.destroy', $evento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este evento?');">
                                    <img src="{{ asset('image/eliminar.png') }}" alt="show">
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">No hay eventos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
>>>>>>> 2ecb418bf437a9912606ccbb3f3fd8c907429ce1
