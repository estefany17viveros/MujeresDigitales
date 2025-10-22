<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Registrar un nuevo usuario (API)
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'required|numeric',
            'num_documento' => 'required|numeric|unique:usuarios,num_documento',
            'contrasena' => 'required|string|min:6|confirmed',
            'email' => 'required|email|unique:usuarios,email',
            'metodo_pago' => ['required', Rule::in(['tarjeta', 'paypal', 'transferencia'])],
        ]);

        $usuario = Usuario::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'num_cel' => $data['num_cel'],
            'num_documento' => $data['num_documento'],
            'contrasena' => Hash::make($data['contrasena']),
            'email' => $data['email'],
            'metodo_pago' => $data['metodo_pago'],
        ]);

        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'usuario' => $usuario,
            'token' => $token
        ], 201);
    }

    /**
     * Mostrar la vista de registro
     */
    public function showRegisterForm()
    {
        return view('usuarios.register'); // Asegúrate que exista resources/views/usuarios/register.blade.php
    }

    /**
     * Mostrar la vista de login
     */
    public function showLoginForm()
    {
        return view('usuarios.login'); // Asegúrate que exista resources/views/usuarios/login.blade.php
    }
}
