@section('content')
<h2 class="titulo-evento">Crear Evento</h2>
<form action="{{ route('eventos.store') }}" method="POST" class="form-evento">
    @csrf
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Fecha y Hora de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fecha y Hora de Fin:</label>
        <input type="datetime-local" name="fecha_fin" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Lugar:</label>
        <input type="text" name="lugar" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Artista:</label>
        <select name="artista_id" class="form-control">
            <option value="">Seleccionar...</option>
            @foreach($artistas as $artista)
                <option value="{{ $artista->id }}">{{ $artista->genero }} - {{ $artista->ciudad }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Localidad:</label>
        <select name="localidad_id" class="form-control">
            <option value="">Seleccionar...</option>
            @foreach($localidades as $localidad)
                <option value="{{ $localidad->id }}">{{ $localidad->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Guardar</button>
</form>

<style>
/* Fondo y tipografía general */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f8f9fa;
    display: flex;
    justify-content: center;
    padding: 30px;
}

/* Título con colores de Colombia */
.titulo-evento {
    text-align: center;
    font-size: 2.2em;
    font-weight: bold;
    background: linear-gradient(90deg, #FFD700 33%, #0033A0 33%, #0033A0 66%, #CE1126 66%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 30px;
}

/* Formulario */
.form-evento {
    background: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 600px;
    transition: transform 0.2s ease;
}

.form-evento:hover {
    transform: translateY(-5px);
}

/* Labels */
.form-evento label {
    font-weight: bold;
    color: #0033A0;
}

/* Inputs y selects */
.form-control {
    width: 100%;
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #CED4DA;
    margin-top: 5px;
    margin-bottom: 15px;
    transition: border 0.3s;
}

.form-control:focus {
    border: 2px solid #FFD700;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
}

/* Botón */
.btn-success {
    background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
    border: none;
    color: #fff;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.4s, transform 0.2s;
    width: 100%;
    font-size: 1.1em;
}

.btn-success:hover {
    transform: scale(1.05);
    background: linear-gradient(90deg, #FFEC70, #3357FF, #FF4B4B);
}
</style>
