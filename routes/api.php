<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CompraController;

<<<<<<< HEAD
// ================================
// RUTAS PÚBLICAS
// ================================
Route::post('/usuarios/register', [UsuarioController::class, 'register']);
Route::post('/usuarios/login', [UsuarioController::class, 'login'])->name('api.login');

Route::get('/login', [UsuarioController::class, 'loginView'])->name('login');
Route::get('/register', [UsuarioController::class, 'registerView'])->name('register');

// Consulta pública de eventos (RF7)
Route::get('/eventos-disponibles', [EventoController::class, 'disponibles'])->name('eventos.disponibles');

// Listar boletas públicas
Route::get('/boletas', [BoletaController::class, 'index'])->name('boletas.index');
Route::get('/boletas/{boleta}', [BoletaController::class, 'show'])->name('boletas.show');
  // Boletas
    Route::get('/boletas/create', [BoletaController::class, 'create'])->name('boletas.create');
    Route::post('/boletas', [BoletaController::class, 'store'])->name('boletas.store');
    Route::get('/boletas/{boleta}/edit', [BoletaController::class, 'edit'])->name('boletas.edit');
    Route::put('/boletas/{boleta}', [BoletaController::class, 'update'])->name('boletas.update');
    Route::delete('/boletas/{boleta}', [BoletaController::class, 'destroy'])->name('boletas.destroy');

// ================================
// RUTAS PROTEGIDAS CON SANCTUM
// ================================
=======
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Prefijo automático: /api
| Ejemplo completo: http://127.0.0.1:8000/api/usuarios/register
|--------------------------------------------------------------------------
*/
 Route::Resource('eventos', EventoController::class);
    Route::Resource('localidades', LocalidadController::class);

Route::get('/boletas', [BoletaController::class, 'index'])->name('boletas.index');
Route::get('/boletas/create', [BoletaController::class, 'create'])->name('boletas.create');
Route::post('/boletas', [BoletaController::class, 'store'])->name('boletas.store');
Route::get('/boletas/{boleta}/edit', [BoletaController::class, 'edit'])->name('boletas.edit');
Route::put('/boletas/{boleta}', [BoletaController::class, 'update'])->name('boletas.update');
Route::delete('/boletas/{boleta}', [BoletaController::class, 'destroy'])->name('boletas.destroy');

    // RUTAS PÚBLICAS
Route::post('/usuarios/register', [RegisterController::class, 'register']);
Route::post('/usuarios/login', [UsuarioController::class, 'login'])->name('api.login');

// vistas web 
Route::get('/login', [UsuarioController::class, 'loginView'])->name('login');
Route::get('/register', [UsuarioController::class, 'registerView'])->name('register');

//RUTAS PROTEGIDAS CON SANCTUM
>>>>>>> 965daf6a2ea9b6fbdeccfe979851bccce4f38837
Route::middleware('auth:sanctum')->group(function () {

    // Usuarios
    Route::get('/usuarios/me', [UsuarioController::class, 'me']);
    Route::get('/usuarios', [UsuarioController::class, 'index']); // solo admin
    Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);
    Route::post('/usuarios/logout', [UsuarioController::class, 'logout']);

    // Eventos
    Route::Resource('eventos', EventoController::class);

    // Localidades
    Route::apiResource('localidades', LocalidadController::class);

    // Artistas
    Route::apiResource('artistas', ArtistaController::class);
    Route::get('artistas/{artista}/asociar-evento', [ArtistaController::class, 'asociarEvento'])->name('artistas.asociar_evento');
    Route::post('artistas/{artista}/guardar-evento', [ArtistaController::class, 'guardarEvento'])->name('artistas.guardar_evento');

  
    // Compra de boletas
    Route::get('/boletas/comprar/{boleta}', [BoletaController::class, 'comprar'])->name('boletas.comprar');
    Route::post('/boletas/pagar/{boleta}', [BoletaController::class, 'pagar'])->name('boletas.pagar');

    // Compras del usuario (historial)
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('/compras/{id}', [CompraController::class, 'show'])->name('compras.show');
});
