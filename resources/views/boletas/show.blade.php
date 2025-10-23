<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Boleta</title>
    <style>
        body {
            background: linear-gradient(to right, #FCD116, #003893, #CE1126);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            color: #003893;
            width: 420px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            color: #CE1126;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        a, button {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        a {
            background-color: #003893;
            color: white;
        }

        a:hover {
            background-color: #CE1126;
            color: white;
        }

        #comprarBtn {
            background-color: #FCD116;
            color: #003893;
            font-weight: bold;
        }

        #comprarBtn:hover {
            background-color: #003893;
            color: #FCD116;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $boleta->evento->nombre }}</h2>

        <p><strong>Localidad:</strong> {{ $boleta->localidad->nombre }}</p>
        <p><strong>Valor:</strong> ${{ number_format($boleta->valor, 0, ',', '.') }}</p>
        <p><strong>Disponibles:</strong> {{ $boleta->cantidad_disponible }}</p>

        <div>
            <a href="{{ route('boletas.edit', $boleta->id) }}">Editar</a>
            <a href="{{ route('boletas.index') }}">Volver</a>
        </div>

        <button id="comprarBtn">Comprar Boleta</button>
    </div>

    <script>
        document.getElementById('comprarBtn').addEventListener('click', () => {
            const token = localStorage.getItem('token');

            if (!token) {
                // Guardamos la URL actual y redirigimos al login
                localStorage.setItem('redirect_after_login', window.location.href);
                window.location.href = "/login";
            } else {
                // Redirigir al formulario de compra
                window.location.href = `/boletas/comprar/{{ $boleta->id }}`;
            }
        });
    </script>
</body>
</html>
