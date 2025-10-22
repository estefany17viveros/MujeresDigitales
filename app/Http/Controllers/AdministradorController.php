<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Necesario para obtener el usuario autenticado
use Illuminate\Support\Facades\Hash; // Necesario para encriptar la contraseña

class AdminController extends Controller
{
    // Home del administrador
    public function index()
    {
        $localidades = Localidad::all();
        return view('admin.home', compact('localidades'));
    }

    // Perfil: mostrar
    public function perfil()
    {
        // Usa Auth::user() para obtener el administrador autenticado
        $admin = Auth::user(); 
        return view('admin.perfil', compact('admin'));
    }

    // Perfil: actualizar
    public function actualizarPerfil(Request $request)
    {
        // Obtiene el administrador autenticado
        $admin = Auth::user();

        // Si no hay administrador autenticado, redirige o maneja el error
        if (!$admin) {
            return redirect()->route('login')->with('error', 'No se pudo encontrar el administrador autenticado.');
        }

        // Reglas de validación para los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'required|integer',
            'num_documento' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:administradors,email,' . $admin->id,
            'contrasena' => 'nullable|string|min:8',
        ]);

        // Prepara los datos para la actualización
        $data = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'num_cel' => $request->num_cel,
            'num_documento' => $request->num_documento,
            'email' => $request->email,
        ];

        // Si se proporciona una nueva contraseña, la encripta y la añade a los datos
        if ($request->filled('contrasena')) {
            $data['contrasena'] = Hash::make($request->contrasena);
        }

        // Actualiza el administrador con los nuevos datos
        return redirect()->route('administrador.perfil')->with('success', 'Perfil actualizado exitosamente.');
    }
}
