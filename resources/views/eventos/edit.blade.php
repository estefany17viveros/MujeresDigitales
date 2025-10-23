<h2>Editar Evento</h2>
<form method="POST" action="{{ route('eventos.update', $evento) }}">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $evento->nombre }}" required>
    <textarea name="descripcion">{{ $evento->descripcion }}</textarea>
    <input type="datetime-local" name="fecha_hora_inicio" value="{{ date('Y-m-d\TH:i', strtotime($evento->fecha_hora_inicio)) }}" required>
    <input type="datetime-local" name="fecha_hora_fin" value="{{ date('Y-m-d\TH:i', strtotime($evento->fecha_hora_fin)) }}" required>
    <input type="text" name="lugar" value="{{ $evento->lugar }}">
    <button type="submit">Actualizar Evento</button>
</form>
