@extends('layout')

@section('content')
<h2>Agregar Artista</h2>
<form action="{{ route('artistas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Género Musical:</label>
        <input type="text" name="genero" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Ciudad Natal:</label>
        <input type="text" name="ciudad" class="form-control" required>
    </div>
    <button class="btn btn-success">Guardar</button>
</form>
@endsection
