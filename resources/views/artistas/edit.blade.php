@extends('layout')

@section('content')
<h2>Editar Artista</h2>
<form action="{{ route('artistas.update', $artista->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Género Musical:</label>
        <input type="text" name="genero" value="{{ $artista->genero }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Ciudad Natal:</label>
        <input type="text" name="ciudad" value="{{ $artista->ciudad }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
