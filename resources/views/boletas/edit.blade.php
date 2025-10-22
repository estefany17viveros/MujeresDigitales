<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Boleta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        nav {
            background: linear-gradient(90deg, #FFD700, #0033A0, #CE1126);
            padding: 10px 20px;
            color: white;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            color: #0033A0;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #0033A0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #CE1126;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ route('boletas.index') }}">Boletas</a>
        <a href="{{ route('boletas.create') }}">Crear Boleta</a>
    </nav>

    <div class="container">
        <h1>Editar Boleta</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('boletas.update', $boleta) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Evento:</label>
            <select name="evento_id">
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}" {{ $boleta->evento_id == $evento->id ? 'selected' : '' }}>
                        {{ $evento->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Localidad:</label>
            <select name="localidad_id">
                @foreach($localidades as $localidad)
                    <option value="{{ $localidad->id }}" {{ $boleta->localidad_id == $localidad->id ? 'selected' : '' }}>
                        {{ $localidad->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Valor:</label>
            <input type="number" step="0.01" name="valor" value="{{ $boleta->valor }}">

            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="{{ $boleta->cantidad }}">

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
