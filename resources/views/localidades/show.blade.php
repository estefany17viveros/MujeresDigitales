
@section('content')
<h2>Detalles de la Localidad</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $localidad->id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $localidad->name }}</li>
    <li class="list-group-item"><strong>Boleta Asociada:</strong> {{ $localidad->boleta_id ?? 'No asignada' }}</li>
</ul>
<a href="{{ route('localidades.index') }}" class="btn btn-secondary mt-3">Volver</a>
