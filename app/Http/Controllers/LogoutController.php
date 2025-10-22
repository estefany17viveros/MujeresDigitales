<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();

        // Revocar todos los tokens (o $user->currentAccessToken()->delete() para uno solo)
        $user->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente.']);
    }
}
