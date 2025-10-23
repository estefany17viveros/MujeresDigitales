<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Localidad</title>
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

        h2 {
            color: #0033A0;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #0033A0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
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
        <a href="{{ route('localidades.index') }}">Localidades</a>
        <a href="{{ route('localidades.create') }}">Agregar Localidad</a>
    </nav>

    <div class="container">
        <h2>Editar Localidad</h2>

        {{-- Mostrar errores de validación --}}
        @if (isset($errors) && $errors->any())
            @foreach ($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('localidades.update', $localidad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre de Localidad:</label>
            <input type="text" name="name" value="{{ $localidad->name }}" required>

            <label>Boleta Asociada:</label>
            <select name="boleta_id">
                <option value="">Seleccionar...</option>
                @isset($boletas)
                    @foreach ($boletas as $boleta)
                        <option value="{{ $boleta->id }}" {{ $localidad->boleta_id == $boleta->id ? 'selected' : '' }}>
                            Boleta #{{ $boleta->id }} - Valor: {{ $boleta->valor }}
                        </option>
                    @endforeach
                @endisset
            </select>

            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
