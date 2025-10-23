<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\LocalidadController;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('usuarios/me', [UsuarioController::class, 'me']);
    Route::get('usuarios', [UsuarioController::class, 'index']);
    Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
    Route::put('usuarios/{id}', [UsuarioController::class, 'update']);
    Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);
    Route::post('usuarios/logout', [UsuarioController::class, 'logout']);
   });
