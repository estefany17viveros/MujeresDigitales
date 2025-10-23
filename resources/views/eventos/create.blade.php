<h2>Crear Evento</h2>
<form method="POST" action="{{ route('eventos.store') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre del Evento" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <input type="datetime-local" name="fecha_hora_inicio" required>
    <input type="datetime-local" name="fecha_hora_fin" required>
    <input type="text" name="lugar" placeholder="Lugar">
    <button type="submit">Guardar Evento</button>
</form>
