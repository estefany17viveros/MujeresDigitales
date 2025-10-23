<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Mostrar formulario de registro.
     */
    public function registerView()
    {
        return view('usuarios.register');
    }

    /**
     * Mostrar formulario de login.
     */
    public function loginView()
    {
        return view('usuarios.login');
    }

    /**
     * Registrar un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'nullable|numeric',
            'num_documento' => 'required|numeric|unique:usuarios,num_documento',
            'email' => 'required|email|unique:usuarios,email',
            'contrasena' => 'required|string|min:6|confirmed', // aseguramos confirmación
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'num_cel' => $request->num_cel,
            'num_documento' => $request->num_documento,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
        ]);

        // Crear token de sesión con Sanctum
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'usuario' => $usuario,
            'token' => $token,
        ], 201);
    }

    /**
     * Iniciar sesión.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (! $usuario || ! Hash::check($request->contrasena, $usuario->contrasena)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales no son correctas.'],
            ]);
        }

        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'usuario' => $usuario,
        ]);
    }

    /**
     * Cerrar sesión.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }

    /**
     * Obtener usuario autenticado.
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Listar todos los usuarios (solo admin).
     */
    public function index()
    {
        return response()->json(Usuario::all());
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    /**
     * Actualizar usuario.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'num_cel' => 'nullable|numeric',
            'num_documento' => 'nullable|numeric|unique:usuarios,num_documento,' . $usuario->id,
            'email' => 'nullable|email|unique:usuarios,email,' . $usuario->id,
            'contrasena' => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->only(['nombre','apellido','num_cel','num_documento','email']);
        if ($request->filled('contrasena')) {
            $data['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($data);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario,
        ]);
    }

    /**
     * Eliminar usuario.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
