<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background: linear-gradient(126deg, rgb(255 213 0 / 29%) 10%, rgb(0 80 157 / 21%) 42%, rgb(217 4 41 / 22%) 85%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: large;
        }
        .card {
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            width: 552px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            height: 60vh;
            justify-content: center;
        }
        .btn-colombia {
            background-color: hsl(45deg 100% 51% / 90%);
            color: white;
            font-size: large;
        }
        .btn-colombia:hover {
            background-color: #e4cf19ff;
            color: white;
        }
        .form-control{
            background-color:hsl(45deg 100% 51% / 17%) !important;
            border-color:hsl(45deg 100% 51% / 43%) !important;
        }
        input:focus {
            background-color: transparent !important;
            box-shadow: none !important; /* Opcional: elimina el borde resaltado */
        }
        input:-internal-autofill-selected {
            background-color:hsl(45deg 100% 51% / 17%) !important;
            padding: 10px;
            font-size: large;
        }
        h3{
            color: hsl(45deg 100% 51% / 90%);
            margin-bottom: 2rem !important;
        }
        .mb-3{
            margin-bottom: 2rem !important;
        }
        #loginForm{
            margin-bottom: 1rem;
        }

    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center mb-4">INICIAR SESIÓN</h3>
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
