<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Colombia App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
             background: linear-gradient(126deg, rgb(255 213 0 / 29%) 10%, rgb(0 80 157 / 21%) 42%, rgb(217 4 41 / 22%) 85%);
             height: 100vh;
             align-content: center;
        }
        .registro_user{
            display: flex;
            justify-content: center;
            margin: 51px;
        }
        .card {
            width: 50%;
            border-radius: 20px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.3);
            background-color: white;
            padding: 30px;
        }
        .divide{
            display: flex;
            justify-content: space-between;
        }
        .divide div{
            width: 48%;
        }
        .btn-colombia {
            background-color: #FCD116;
            color: black;
            font-weight: bold;
            border: none;
        }
        .btn-colombia:hover {
            background-color: #003893;
            color: white;
        }
        h3 {
            color: #FCD116;
            font-weight: bold;
        }
        a {
            color: #003893;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
            color: #CE1126;
        }
    </style>
</head>
<body>

    <section class="registro_user">
        <div class="card">
            <h3 class="text-center mb-4">Registrarme</h3>
            <form id="registerForm">
                <article class="divide">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" class="form-control" required>
                    </div>
                </article>

                <article class="divide">
                    <div class="mb-3">
                        <label for="num_cel" class="form-label">Número de Celular</label>
                        <input type="text" id="num_cel" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="num_documento" class="form-label">Número de Documento</label>
                        <input type="text" id="num_documento" class="form-control" required>
                    </div>
                </article>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" id="email" class="form-control" required>
                </div>

                <article class="divide">
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" id="contrasena" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="contrasena_confirmation" class="form-control" required>
                    </div>
                </article>

                <div class="mb-3">
                    <label for="metodo_pago" class="form-label">Método de Pago</label>
                    <select id="metodo_pago" class="form-select" required>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="paypal">PayPal</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-colombia w-100">Registrarse</button>
            </form>

            <p class="text-center mt-3">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Inicia sesión</a>
            </p>
        </div>
    </section>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = {
                nombre: document.getElementById('nombre').value,
                apellido: document.getElementById('apellido').value,
                num_cel: document.getElementById('num_cel').value,
                num_documento: document.getElementById('num_documento').value,
                email: document.getElementById('email').value,
                contrasena: document.getElementById('contrasena').value,
                contrasena_confirmation: document.getElementById('contrasena_confirmation').value,
                metodo_pago: document.getElementById('metodo_pago').value
            };

            try {
                const response = await fetch('http://localhost:8000/api/usuarios/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    alert('✅ Usuario registrado con éxito');
                    window.location.href = '/api/usuarios/login';
                } else {
                    let errorMsg = '❌ Error al registrar usuario.';
                    if (result.errors) {
                        errorMsg += '\\n' + Object.values(result.errors).flat().join('\\n');
                    } else if (result.message) {
                        errorMsg += '\\n' + result.message;
                    }
                    alert(errorMsg);
                    console.error(result);
                }
            } catch (error) {
                alert('❌ Error en la conexión con el servidor.');
                console.error(error);
            }
        });
    </script>
</body>
</html>
