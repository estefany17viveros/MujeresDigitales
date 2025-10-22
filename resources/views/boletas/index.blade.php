<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Boletas</title>
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
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            color: #0033A0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #0033A0;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #FFD700;
        }

        button, a.button {
            background-color: #0033A0;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        button:hover, a.button:hover {
            background-color: #CE1126;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        form {
            display: inline;
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
        <h1>Listado de Boletas</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <table>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Localidad</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
            @foreach($boletas as $boleta)
            <tr>
                <td>{{ $boleta->id }}</td>
                <td>{{ $boleta->evento->nombre }}</td>
                <td>{{ $boleta->localidad->nombre }}</td>
                <td>${{ number_format($boleta->valor, 0, ',', '.') }}</td>
                <td>{{ $boleta->cantidad }}</td>
                <td>
                    <a href="{{ route('boletas.edit', $boleta) }}" class="button">Editar</a>
                    <form action="{{ route('boletas.destroy', $boleta) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
