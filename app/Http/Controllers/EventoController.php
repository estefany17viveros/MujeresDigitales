<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Artista;
use App\Models\Localidad;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Mostrar todos los eventos
    public function index()
    {
        $eventos = Evento::with('artistas', 'localidades')->get();
        return view('eventos.index', compact('eventos'));
    }

    // Mostrar formulario para crear un evento
    public function create()
    {
        $artistas = Artista::all();       // Traer todos los artistas
        $localidades = Localidad::all();  // Traer todas las localidades

        return view('eventos.create', compact('artistas', 'localidades'));
    }

    // Guardar un nuevo evento
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora_inicio' => 'required|date',
            'fecha_hora_fin' => 'required|date|after_or_equal:fecha_hora_inicio',
            'lugar' => 'nullable|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'localidad_id' => 'required|exists:localidades,id',
        ]);

        // Crear el evento
        $evento = Evento::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha_hora_inicio' => $data['fecha_hora_inicio'],
            'fecha_hora_fin' => $data['fecha_hora_fin'],
            'lugar' => $data['lugar'],
        ]);

        // Asociar artista al evento (tabla pivot artista_evento)
        $evento->artistas()->attach($data['artista_id']);

        // Asociar localidad al evento (si es necesario, depende de tu diseño)
        // $evento->localidades()->attach($data['localidad_id']);

        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente');
    }

    // Mostrar formulario para editar un evento
    public function edit(Evento $evento)
    {
        $artistas = Artista::all();
        $localidades = Localidad::all();
        return view('eventos.edit', compact('evento', 'artistas', 'localidades'));
    }

    // Actualizar un evento
    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora_inicio' => 'required|date',
            'fecha_hora_fin' => 'required|date|after_or_equal:fecha_hora_inicio',
            'lugar' => 'nullable|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'localidad_id' => 'required|exists:localidades,id',
        ]);

        $evento->update([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha_hora_inicio' => $data['fecha_hora_inicio'],
            'fecha_hora_fin' => $data['fecha_hora_fin'],
            'lugar' => $data['lugar'],
        ]);

        // Actualizar artista asociado
        $evento->artistas()->sync($data['artista_id']);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente');
    }

    // Eliminar un evento
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado');
    }
}
