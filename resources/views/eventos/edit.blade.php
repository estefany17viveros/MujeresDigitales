@section('content')
<h2>Editar Evento</h2>
<form action="{{ route('eventos.update', $evento->id) }}" method="POST" class="form-evento">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $evento->nombre }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control" required>{{ $evento->descripcion }}</textarea>
    </div>
    <div class="mb-3">
        <label>Fecha Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" value="{{ $evento->fecha_inicio }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Fecha Fin:</label>
        <input type="datetime-local" name="fecha_fin" value="{{ $evento->fecha_fin }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Lugar:</label>
        <input type="text" name="lugar" value="{{ $evento->lugar }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>

<style>
/* Contenedor */
.form-evento {
    max-width: 600px;
    margin: auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* Título */
h2 {
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    background: linear-gradient(90deg, #FFD700 33%, #0033A0 33%, #0033A0 66%, #CE1126 66%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
}

/* Inputs y textareas */
.form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #CED4DA;
    transition: border 0.3s, box-shadow 0.3s;
}

.form-control:focus {
    border: 2px solid #FFD700;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
}

/* Botón */
.btn-primary {
    background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
    border: none;
    color: white;
    font-weight: bold;
    padding: 12px;
    width: 100%;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.2s, background 0.3s;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #FFEC70, #3357FF, #FF4B4B);
    transform: scale(1.05);
}
</style>
