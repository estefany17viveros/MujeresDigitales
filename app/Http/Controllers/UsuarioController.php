<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'required|numeric',
            'num_documento' => 'required|numeric|unique:usuarios,num_documento',
            'email' => 'required|email|unique:usuarios,email',
            'contrasena' => 'required|string|min:6',
            'metodo_pago' => 'required|in:tarjeta,paypal,transferencia',
            'compra_id' => 'nullable|exists:compras,id',
            'evento_id' => 'nullable|exists:eventos,id',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'num_cel' => $request->num_cel,
            'num_documento' => $request->num_documento,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
            'metodo_pago' => $request->metodo_pago,
            'compra_id' => $request->compra_id,
            'evento_id' => $request->evento_id,
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
        $usuarios = Usuario::all();
        return response()->json($usuarios);
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
            'metodo_pago' => 'nullable|in:tarjeta,paypal,transferencia',
            'contrasena' => 'nullable|string|min:6',
        ]);

        $data = $request->only([
            'nombre', 'apellido', 'num_cel', 'num_documento',
            'email', 'metodo_pago', 'compra_id', 'evento_id'
        ]);

        if ($request->filled('contrasena')) {
            $data['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($data);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario
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
    public function loginView()
{
    return view('usuarios.login');
}

public function registerView()
{
    return view('usuarios.register');
}

}
