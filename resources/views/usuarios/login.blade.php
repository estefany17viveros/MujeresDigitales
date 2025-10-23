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

    try {
        const response = await fetch("{{ route('api.login') }}", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, contrasena })
        });

        const data = await response.json();

        if (response.ok && data.token) {
            // Guardamos token y usuario en localStorage
            localStorage.setItem('token', data.token);
            localStorage.setItem('user', JSON.stringify(data.usuario));

            alert('✅ Inicio de sesión exitoso');

            // Redirigir a la ruta protegida correcta
            const redirectUrl = localStorage.getItem('redirect_after_login') || "{{ route('boletas.index') }}";
            localStorage.removeItem('redirect_after_login');
            window.location.href = redirectUrl;

        } else {
            alert(data.message || '❌ Correo o contraseña incorrectos');
        }

    } catch (error) {
        console.error(error);
        alert('❌ Error al conectarse al servidor');
    }
});
</script>

</body>
</html>
