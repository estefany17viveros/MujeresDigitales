<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all();
        return view('administradores.index', compact('administradores'));
    }

    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'required|integer',
            'num_documento' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:administradors',
            'contrasena' => 'required|string|min:8',
        ]);

        Administrador::create($request->all());

        return redirect()->route('administradores.index')->with('success', 'Administrador creado exitosamente.');
    }

    public function show(Administrador $administrador)
    {
        return view('administradores.show', compact('administrador'));
    }

    public function edit(Administrador $administrador)
    {
        return view('administradores.edit', compact('administrador'));
    }

    public function update(Request $request, Administrador $administrador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'num_cel' => 'required|integer',
            'num_documento' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:administradors,email,' . $administrador->id,
            'contrasena' => 'nullable|string|min:8',
        ]);

        $administrador->update($request->all());

        return redirect()->route('administradores.index')->with('success', 'Administrador actualizado exitosamente.');
    }

    public function destroy(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('administradores.index')->with('success', 'Administrador eliminado exitosamente.');
    }
}
