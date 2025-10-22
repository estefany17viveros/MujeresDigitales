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
