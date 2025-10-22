<<<<<<< HEAD
@section('content')
<h2>Detalles del Evento</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> {{ $evento->nombre }}</li>
    <li class="list-group-item"><strong>Descripción:</strong> {{ $evento->descripcion }}</li>
    <li class="list-group-item"><strong>Inicio:</strong> {{ $evento->fecha_inicio }}</li>
    <li class="list-group-item"><strong>Fin:</strong> {{ $evento->fecha_fin }}</li>
    <li class="list-group-item"><strong>Lugar:</strong> {{ $evento->lugar }}</li>
</ul>

<a href="{{ route('eventos.index') }}" class="btn btn-secondary mt-3">Volver</a>

<style>
/* Contenedor general */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f8f9fa;
    padding: 30px;
}

/* Título */
h2 {
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    background: linear-gradient(90deg, #FFD700 33%, #0033A0 33%, #0033A0 66%, #CE1126 66%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
}

/* Lista de detalles */
.list-group {
    max-width: 600px;
    margin: auto;
}

.list-group-item {
    background: #ffffff;
    border-left: 5px solid #FFD700;
    border-radius: 8px;
    margin-bottom: 10px;
    padding: 12px 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.list-group-item strong {
    color: #0033A0;
}

/* Botón volver */
.btn-secondary {
    display: block;
    max-width: 200px;
    margin: 20px auto 0 auto;
    background: #6c757d;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    text-align: center;
    transition: background 0.3s, transform 0.2s;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: scale(1.05);
}
</style>
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Detalle de eventos</title>
</head>
<body>
    <header class="encabezado">
        <nav>
            <img src="{{ asset('image/logo.png') }}" alt="">
            <button class="inicio">Iniciar sesión</button>
        </nav>
        <main>
            <h1>¡Vive las Ferias de Colombia!</h1>
            <p>Descubre los mejores eventos y ferias colombianas. Compra tus boletos de forma fácil y segura.</p>
        </main>
    </header>


    <section>
        <h2 style="text-align: center;">Detalle del Evento</h2>

        <div class="container">
            <div class="card">
                <h4> {{ $evento->nombre }}</h4>

                <fieldset>
                    <p>{{ $evento->descripcion }}</p>
                </fieldset>

                <article class="dimension_fechas">                
                    <fieldset class="fecha">
                        <img src="{{ asset('image/calendario.png') }}" alt="">
                        <p>{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}</p>
                    </fieldset>
                    <fieldset class="fecha">
                        <img src="{{ asset('image/fecha-tope.png') }}" alt="">
                        <p>{{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}</p>
                    </fieldset>
                </article>
                <fieldset class="fecha">
                    <img src="{{ asset('image/ubicacion.png') }}" alt="">
                    <p>{{ $evento->lugar }}</p>
                </fieldset>
                <fieldset class="fecha">
                    <img src="{{ asset('image/profesor.png') }}" alt="">
                    <p> {{ $evento->artista->genero ?? 'N/A' }} - {{ $evento->artista->ciudad ?? 'N/A' }}</p>
                </fieldset>
                <fieldset class="fecha">
                    <img src="{{ asset('image/rango-militar.png') }}" alt="">
                    <p>{{ $evento->localidad->nombre ?? 'N/A' }}</p>
                </fieldset>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary volver">Volver al listado</a>
            </div>
        </div>
    </section>
</body>
</html>
>>>>>>> 2ecb418bf437a9912606ccbb3f3fd8c907429ce1
