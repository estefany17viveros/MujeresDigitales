<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $data['email'])->first();

        if (! $usuario || ! Hash::check($data['contrasena'], $usuario->contrasena)) {
            return response()->json(['message' => 'Credenciales inválidas.'], 401);
        }

        // Crear token (puedes nombrarlo con el user-agent o dispositivo)
        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'usuario' => $usuario,
            'token' => $token,
        ], 200);
    }
}
