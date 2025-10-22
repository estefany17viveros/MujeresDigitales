<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Evento;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
  

    public function index()
    {
        $artistas = Artista::with('eventos')->paginate(15);
        $eventos = Evento::orderBy('fecha_hora_inicio')->get();
        return view('artistas.index', compact('artistas','eventos'));
    }

    public function create()
    {
        return view('artistas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'genero' => 'nullable|string|max:100',
            'ciudad_natal' => 'nullable|string|max:100',
        ]);

        Artista::create($data);
        return redirect()->route('artistas.index')->with('success','Artista creado.');
    }

    public function edit(Artista $artista)
    {
        return view('artistas.edit', compact('artista'));
    }

    public function update(Request $request, Artista $artista)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'genero' => 'nullable|string|max:100',
            'ciudad_natal' => 'nullable|string|max:100',
        ]);

        $artista->update($data);
        return redirect()->route('artistas.index')->with('success','Artista actualizado.');
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artistas.index')->with('success','Artista eliminado.');
    }

    // RF5: asociar artista a evento (evita solapamiento)
    public function asociar(Request $request, Artista $artista)
    {
        $data = $request->validate([
            'evento_id' => 'required|exists:eventos,id',
        ]);

        $evento = Evento::findOrFail($data['evento_id']);

        // Verificar solapamientos:
        $conflicto = $artista->eventos()->where(function($q) use ($evento) {
            $q->whereBetween('fecha_hora_inicio', [$evento->fecha_hora_inicio, $evento->fecha_hora_fin])
              ->orWhereBetween('fecha_hora_fin', [$evento->fecha_hora_inicio, $evento->fecha_hora_fin])
              ->orWhere(function($q2) use ($evento) {
                  $q2->where('fecha_hora_inicio', '<=', $evento->fecha_hora_inicio)
                     ->where('fecha_hora_fin', '>=', $evento->fecha_hora_fin);
              });
        })->exists();

        if ($conflicto) {
            return back()->withErrors(['evento_id' => 'Conflicto: el artista ya participa en otro evento en ese horario.']);
        }

        $artista->eventos()->attach($evento->id);

        return redirect()->route('artistas.index')->with('success','Artista asociado al evento.');
    }

    public function desasociar(Request $request, Artista $artista)
    {
        $data = $request->validate(['evento_id' => 'required|exists:eventos,id']);
        $artista->eventos()->detach($data['evento_id']);
        return redirect()->route('artistas.index')->with('success','Asociación eliminada.');
    }
}
