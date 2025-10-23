<<<<<<< HEAD

=======
>>>>>>> 965daf6a2ea9b6fbdeccfe979851bccce4f38837
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
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 965daf6a2ea9b6fbdeccfe979851bccce4f38837
