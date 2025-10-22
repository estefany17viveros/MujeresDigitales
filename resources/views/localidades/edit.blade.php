@extends('layout')

@section('content')
<h2>Editar Localidad</h2>
<form action="{{ route('localidades.update', $localidad->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nombre de Localidad:</label>
        <input type="text" name="name" value="{{ $localidad->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Boleta Asociada:</label>
        <select name="boleta_id" class="form-control">
            <option value="">Seleccionar...</option>
            @foreach($boletas as $boleta)
                <option value="{{ $boleta->id }}" {{ $localidad->boleta_id == $boleta->id ? 'selected' : '' }}>
                    Boleta #{{ $boleta->id }} - Valor: {{ $boleta->valor }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
