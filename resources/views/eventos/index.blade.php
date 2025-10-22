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
