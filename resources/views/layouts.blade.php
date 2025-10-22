<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos Colombianos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        nav { background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126); }
        nav a { color: white !important; font-weight: bold; margin-right: 15px; }
        footer {
            background: #0033A0;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">🇨🇴 Eventos Colombia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Route::has('eventos.index'))
                    <li class="nav-item"><a href="{{ route('eventos.index') }}" class="nav-link">Eventos</a></li>
                @endif
                @if(Route::has('boletas.index'))
                    <li class="nav-item"><a href="{{ route('boletas.index') }}" class="nav-link">Boletas</a></li>
                @endif
                @if(Route::has('localidades.index'))
                    <li class="nav-item"><a href="{{ route('localidades.index') }}" class="nav-link">Localidades</a></li>
                @endif
                @if(Route::has('artistas.index'))
                    <li class="nav-item"><a href="{{ route('artistas.index') }}" class="nav-link">Artistas</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer>
    <p>© 2025 Sistema de Eventos Colombianos 🇨🇴 | Desarrollado en Laravel</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
