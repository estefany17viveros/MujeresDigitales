<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Evento;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::all();
        return view('artistas.index', compact('artistas'));
    }

    public function create()
    {
        return view('artistas.create');
    }

    public function store(Request $request)
    {
        Artista::create($request->all());
        return redirect()->route('artistas.index');
    }

    public function edit(Artista $artista)
    {
        return view('artistas.edit', compact('artista'));
    }

    public function update(Request $request, Artista $artista)
    {
        $artista->update($request->all());
        return redirect()->route('artistas.index');
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artistas.index');
    }

    // Asociar artista a un evento
    public function asociarEvento(Artista $artista)
    {
        $eventos = Evento::all();
        return view('artistas.asociar_evento', compact('artista', 'eventos'));
    }

    public function guardarEvento(Request $request, Artista $artista)
    {
        $artista->eventos()->attach($request->evento_id);
        return redirect()->route('artistas.index');
    }
}
