<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    // Listar eventos
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    // Vista crear evento
    public function create()
    {
        return view('eventos.create');
    }

    // Guardar evento
    public function store(Request $request)
    {
        Evento::create($request->all());
        return redirect()->route('eventos.index');
    }

    // Vista editar evento
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    // Actualizar evento
    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());
        return redirect()->route('eventos.index');
    }

    // Eliminar evento
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index');
    }
}
