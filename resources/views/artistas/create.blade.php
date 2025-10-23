<h2>Crear Artista</h2>
<form method="POST" action="{{ route('artistas.store') }}">
    @csrf
    <input type="text" name="nombres" placeholder="Nombres" required>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <input type="text" name="genero" placeholder="Género Musical">
    <input type="text" name="ciudad_natal" placeholder="Ciudad Natal">
    <button type="submit">Guardar Artista</button>
</form>
