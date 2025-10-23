<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Boleta</title>
    <style>
        body {
            background-color: #FFD700;
            font-family: 'Poppins';
            text-align: center;
            color: #003300;
        }
        h1 { color: #0033A0; }
        form {
            background: #fff;
            padding: 25px;
            margin: 40px auto;
            width: 400px;
            border-radius: 15px;
        }
        input {
            width: 90%;
            margin: 10px;
            padding: 8px;
            border: 2px solid #0033A0;
            border-radius: 8px;
        }
        button {
            background-color: #0033A0;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #003300;
            color: #FFD700;
        }
    </style>
</head>
<body>
    <h1>✏️ Editar Boleta</h1>
    <form action="{{ route('voletas.update', $voleta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Localidad:</label>
        <input type="text" name="localidad" value="{{ $voleta->localidad }}" required>

        <label>Valor:</label>
        <input type="number" name="valor" value="{{ $voleta->valor }}" required>

        <label>Cantidad Disponible:</label>
        <input type="number" name="cantidad" value="{{ $voleta->cantidad }}" required>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
