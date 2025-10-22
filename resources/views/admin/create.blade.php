<div class="form-container">
    <style>
        :root {
            --primary-color: #800080; /* Morado oscuro */
            --secondary-color: #e6cce6; /* Morado claro */
            --text-color: #333;
            --light-text-color: #666;
            --background-color: #f4f7f9;
            --border-color: #ccc;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }
        .form-container { font-family: Arial, sans-serif; background-color: var(--background-color); display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .form-wrapper { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px var(--shadow-color); width: 100%; max-width: 600px; }
        .form-wrapper h1 { color: var(--primary-color); text-align: center; margin-bottom: 30px; font-size: 28px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: var(--text-color); }
        .form-control { width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 6px; box-sizing: border-box; font-size: 16px; }
        .form-control:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 5px var(--secondary-color); }
        .button-group { display: flex; justify-content: flex-end; gap: 10px; margin-top: 30px; }
        .btn { padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; text-transform: uppercase; transition: background-color 0.3s ease; text-decoration: none; display: inline-flex; justify-content: center; align-items: center; }
        .btn-primary { background-color: var(--primary-color); color: #fff; }
        .btn-primary:hover { background-color: #6a006a; }
        .btn-secondary { background-color: #fff; color: var(--light-text-color); border: 1px solid var(--border-color); }
        .btn-secondary:hover { background-color: var(--background-color); }
        .alert-success { background-color: var(--secondary-color); color: var(--primary-color); padding: 15px; border-radius: 5px; border: 1px solid var(--primary-color); margin-bottom: 20px; text-align: center; }
    </style>
    <div class="form-wrapper">
        <h1>Registrar Localidad y Boletas</h1>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('localidads.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de Localidad:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor de Boleta:</label>
                <input type="number" name="valor" id="valor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad de Boletas:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="button-group">
                <a href="{{ route('administrador.home') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
