@extends('layout')

@section('content')
<h2>Agregar Localidad</h2>
<form action="{{ route('localidades.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre de Localidad:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Boleta Asociada:</label>
        <select name="boleta_id" class="form-control">
            <option value="">Seleccionar...</option>
            @foreach($boletas as $boleta)
                <option value="{{ $boleta->id }}">Boleta #{{ $boleta->id }} - Valor: {{ $boleta->valor }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Guardar</button>
</form>
@endsection
