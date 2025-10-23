<h2>Crear Localidad</h2>
<form method="POST" action="{{ route('localidades.store') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre de Localidad" required>
    <button type="submit">Guardar Localidad</button>
</form>
