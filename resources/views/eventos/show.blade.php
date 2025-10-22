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
        .card { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px var(--shadow-color); width: 100%; max-width: 600px; margin: 40px auto; }
        .card h1 { color: var(--primary-color); text-align: center; margin-bottom: 30px; font-size: 28px; }
        .card p { margin-bottom: 15px; font-size: 16px; color: var(--text-color); }
        .card strong { color: var(--primary-color); display: inline-block; width: 150px; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: #fff; text-decoration: none; display: inline-block; margin-top: 20px; }
        .btn-secondary { background-color: #6c757d; }
        .btn-secondary:hover { background-color: #5a6268; }
    </style>
    <div class="card">
        <h1>Detalle del Evento</h1>
        <p><strong>Nombre:</strong> {{ $evento->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
        <p><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}</p>
        <p><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}</p>
        <p><strong>Lugar:</strong> {{ $evento->lugar }}</p>
        <p><strong>Artista:</strong> {{ $evento->artista->genero ?? 'N/A' }} - {{ $evento->artista->ciudad ?? 'N/A' }}</p>
        <p><strong>Localidad:</strong> {{ $evento->localidad->nombre ?? 'N/A' }}</p>
        <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
</div>
