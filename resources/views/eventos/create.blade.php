
<body>
    @section('content')
    
    <header class="encabezado">
        <nav>
            <img src="{{ asset('image/logo.png') }}" alt="">
            <a href=""></a>
        </nav>
        <main>
            <h1>¡Vive las Ferias de Colombia!</h1>
            <p>Regístrate gratis para comprar tus boletas</p>
        </main>
    </header>
    <section class="registro_user">

        <main class="main_guardar"> 
            <h2 class="titulo-evento">Crear Evento</h2>

            <form action="{{ route('eventos.store') }}" method="POST" class="form-evento">
                @csrf
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Digite el nombre">
                </div>
                <div class="mb-3">
                    <label>Descripción:</label>
                    <textarea name="descripcion" class="form-control" required placeholder="Digite la descripción del evento"></textarea>
                </div>
                <div class="mb-3">
                    <label>Fecha y Hora de Inicio:</label>
                    <input type="datetime-local" name="fecha_hora_inicio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Fecha y Hora de Fin:</label>
                    <input type="datetime-local" name="fecha_hora_fin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Lugar:</label>
                    <input type="text" name="lugar" class="form-control" required placeholder="Digite el lugar donde se va llevar a cabo el evento">
                </div>
                <div class="mb-3">
                    <label>Artista:</label>
                    <select name="artista_id" class="form-control select" required>
                        <option value="">Seleccionar...</option>
                        @foreach($artistas as $artista)
                            <option value="{{ $artista->id }}">{{ $artista->nombres }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Localidad:</label>
                    <select name="localidad_id" class="form-control select" required>
                        <option value="">Seleccionar...</option>
                        @foreach($localidades as $localidad)
                            <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Guardar</button>
            </form>
        </main>
    </section>


<style>
        .registro_user{
            display: flex;
            justify-content: center;
            margin: 51px;
        }
/* Fondo y tipografía general */
body {
    font-family: Arial, sans-serif !important; 
}

/* Título con colores de Colombia */
.titulo-evento {
    text-align: center;
    font-size: 2.2em;
    font-weight: bold;
    margin-bottom: 30px;
    color: #0033A0;
}
.main_guardar{
    width: 40%;
}
/* Formulario */
.form-evento {
    border: 1px;
    border-color: rgba(0, 80, 157, 1);
    background-color:rgba(0, 81, 157, 0.32);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 600px;
    transition: transform 0.2s ease;
}

.form-evento:hover {
    transform: translateY(-5px);
}

 .encabezado{
            background: #FFD500;
            background: linear-gradient(90deg, rgba(255, 213, 0, 1) 10%, rgba(0, 80, 157, 1) 42%, rgba(217, 4, 41, 1) 85%);
            height: 30vh;
        }
        .encabezado h1{
            margin: 0 !important;
        }
        .encabezado main{
            align-content: center;
            text-align: center;
            color: white !important;
            font-size: larger !important;
        }
        .encabezado nav img{
            width: 10%;
            padding-top: 20px;
        }
        .encabezado nav{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 2rem;
            padding-right: 2rem;
        }

    /* Labels */
    .form-evento label {
        font-weight: bold;
        color: #0033A0;
    }

    /* Inputs y selects */
    .form-control {
        width: 95%;
        padding: 10px 12px;
        border-radius: 5px;
        border: 1px solid #CED4DA;
        margin-top: 5px;
        margin-bottom: 15px;
        transition: border 0.3s;
    }

    .form-control:focus {
        border: 2px solid #FFD700;
        outline: none;
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
    }

    /* Botón */
    .btn-success {
        background-color:#0033A0;
        border: none;
        color: #fff;
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.4s, transform 0.2s;
        width: 100%;
        font-size: 1.1em;
    }

    .btn-success:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #FFEC70, #3357FF, #FF4B4B);
    }
    .select{
        width: 100%;
    }
    </style>
</body>
