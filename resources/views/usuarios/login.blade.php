<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #FCD116, #003893, #CE1126);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 380px;
            border-radius: 20px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
        }
        .btn-colombia {
            background-color: #003893;
            color: white;
        }
        .btn-colombia:hover {
            background-color: #CE1126;
        }
    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center mb-4 text-primary">Iniciar Sesión</h3>
        <form id="loginForm">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" placeholder="tucorreo@example.com" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" id="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-colombia w-100">Entrar</button>
        </form>

        <p class="text-center mt-3">¿No tienes cuenta? 
            <a href="{{ route('register') }}">Regístrate aquí</a>
        </p>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const contrasena = document.getElementById('contrasena').value;

            const response = await fetch('http://localhost:8000/api/usuarios/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, contrasena })
            });

            const data = await response.json();

            if (response.ok) {
                alert('✅ Inicio de sesión exitoso');
                console.log(data);
            } else {
                alert('❌ Error al iniciar sesión');
                console.error(data);
            }
        });
    </script>
</body>
</html>
