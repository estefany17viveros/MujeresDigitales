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
        // Cambiar 'localidades' por 'localidad' (singular) según relación belongsTo
        $eventos = Evento::with('artistas', 'localidad')->get();
        return view('eventos.index', compact('eventos'));
    }

    // Mostrar formulario para crear un evento
    public function create()
    {
        $artistas = Artista::all();
        $localidades = Localidad::all();

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

        // Crear el evento con localidad_id incluido
        $evento = Evento::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha_hora_inicio' => $data['fecha_hora_inicio'],
            'fecha_hora_fin' => $data['fecha_hora_fin'],
            'lugar' => $data['lugar'],
            'localidad_id' => $data['localidad_id'],
        ]);

        // Asociar artista al evento (tabla pivote)
        $evento->artistas()->attach($data['artista_id']);

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

        // Actualizar datos del evento, incluyendo localidad_id
        $evento->update([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha_hora_inicio' => $data['fecha_hora_inicio'],
            'fecha_hora_fin' => $data['fecha_hora_fin'],
            'lugar' => $data['lugar'],
            'localidad_id' => $data['localidad_id'],
        ]);

        // Actualizar artista asociado (sync espera un array)
        $evento->artistas()->sync([$data['artista_id']]);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente');
    }

    // Eliminar un evento
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado');
    }
}
