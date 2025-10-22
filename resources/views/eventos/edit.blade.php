<div class="form-container">
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
        .form-container { font-family: Arial, sans-serif; background-color: var(--background-color); display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .form-wrapper { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px var(--shadow-color); width: 100%; max-width: 600px; }
        .form-wrapper h1 { color: var(--primary-color); text-align: center; margin-bottom: 30px; font-size: 28px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: var(--text-color); }
        .form-control { width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 6px; box-sizing: border-box; font-size: 16px; }
        .form-control:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 5px var(--secondary-color); }
        textarea.form-control { resize: vertical; min-height: 100px; }
        .button-group { display: flex; justify-content: flex-end; gap: 10px; margin-top: 30px; }
        .btn { padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; text-transform: uppercase; transition: background-color 0.3s ease; text-decoration: none; display: inline-flex; justify-content: center; align-items: center; }
        .btn-primary { background-color: var(--primary-color); color: #fff; }
        .btn-primary:hover { background-color: #6a006a; }
        .btn-secondary { background-color: #fff; color: var(--light-text-color); border: 1px solid var(--border-color); }
        .btn-secondary:hover { background-color: var(--background-color); }
    </style>
    <div class="form-wrapper">
        <h1>Editar Evento</h1>
        <form action="{{ route('eventos.update', $evento) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $evento->nombre) }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $evento->descripcion) }}</textarea>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha y hora de inicio:</label>
                <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', \Carbon\Carbon::parse($evento->fecha_inicio)->format('Y-m-d\TH:i')) }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha y hora de fin:</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin', \Carbon\Carbon::parse($evento->fecha_fin)->format('Y-m-d\TH:i')) }}" required>
            </div>
            <div class="form-group">
                <label for="lugar">Lugar:</label>
                <input type="text" name="lugar" id="lugar" class="form-control" value="{{ old('lugar', $evento->lugar) }}" required>
            </div>
            <div class="form-group">
                <label for="artista_id">Artista:</label>
                <select name="artista_id" id="artista_id" class="form-control">
                    <option value="">Seleccione un artista</option>
                    @foreach ($artistas as $artista)
                        <option value="{{ $artista->id }}" {{ $evento->artista_id == $artista->id ? 'selected' : '' }}>
                            {{ $artista->genero }} - {{ $artista->ciudad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="localidad_id">Localidad:</label>
                <select name="localidad_id" id="localidad_id" class="form-control">
                    <option value="">Seleccione una localidad</option>
                    @foreach ($localidades as $localidad)
                        <option value="{{ $localidad->id }}" {{ $evento->localidad_id == $localidad->id ? 'selected' : '' }}>
                            {{ $localidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="button-group">
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
