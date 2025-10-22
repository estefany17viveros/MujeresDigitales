<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Artista;
use App\Models\Localidad;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with(['artista', 'localidad'])->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $artistas = Artista::all();
        $localidades = Localidad::all();
        return view('eventos.create', compact('artistas', 'localidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'lugar' => 'required|string|max:255',
            'artista_id' => 'nullable|exists:artistas,id',
            'localidad_id' => 'nullable|exists:localidads,id',
        ]);

        Evento::create($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento registrado exitosamente.');
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        $artistas = Artista::all();
        $localidades = Localidad::all();
        return view('eventos.edit', compact('evento', 'artistas', 'localidades'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'lugar' => 'required|string|max:255',
            'artista_id' => 'nullable|exists:artistas,id',
            'localidad_id' => 'nullable|exists:localidads,id',
        ]);

        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }
}
