<div class="container">
    <style>
        :root {
            --primary-color: #800080;
            --secondary-color: #e6cce6;
            --text-color: #333;
            --light-text-color: #666;
            --background-color: #f4f7f9;
            --border-color: #ccc;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }
        body { font-family: Arial, sans-serif; background-color: var(--background-color); }
        .table-container { padding: 40px; }
        h1 { color: var(--primary-color); text-align: center; margin-bottom: 30px; }
        .alert-success { background-color: var(--secondary-color); color: var(--primary-color); padding: 15px; border-radius: 5px; border: 1px solid var(--primary-color); margin-bottom: 20px; text-align: center; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; color: #fff; text-decoration: none; margin-right: 5px; display: inline-flex; justify-content: center; align-items: center; }
        .btn-primary { background-color: var(--primary-color); }
        .btn-primary:hover { background-color: #6a006a; }
        .btn-success { background-color: #28a745; }
        .btn-warning { background-color: #ffc107; }
        .btn-danger { background-color: #dc3545; }
        .btn-success:hover { background-color: #218838; }
        .btn-warning:hover { background-color: #e0a800; }
        .btn-danger:hover { background-color: #c82333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 4px 15px var(--shadow-color); background: #fff; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #ddd; }
        th { background-color: var(--primary-color); color: #fff; }
        tr:hover { background-color: #f1f1f1; }
    </style>
    <div class="table-container">
        <h1>Listado de Eventos</h1>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('eventos.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Registrar Nuevo Evento</a>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Lugar</th>
                    <th>Artista</th>
                    <th>Localidad</th>
                    <th>Acciones</th>
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
                            <a href="{{ route('eventos.show', $evento) }}" class="btn btn-success">Ver</a>
                            <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eventos.destroy', $evento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este evento?');">Eliminar</button>
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
