<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Evento;
use App\Models\Localidad;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Mostrar todas las boletas.
     */
    public function index()
    {
        $boletas = Boleta::with(['evento', 'localidad'])->get();
        return view('boletas.index', compact('boletas'));
    }

    /**
     * Mostrar formulario para crear una nueva boleta.
     */
    public function create()
    {
        $eventos = Evento::all();
        $localidades = Localidad::all();
        return view('boletas.create', compact('eventos', 'localidades'));
    }

    /**
     * Guardar nueva boleta en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'localidad_id' => 'required|exists:localidades,id',
            'valor' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
        ]);

        Boleta::create($validated);

        return redirect()->route('boletas.index')->with('success', 'Boleta creada exitosamente');
    }

    /**
     * Mostrar formulario para editar una boleta.
     */
    public function edit(Boleta $boleta)
    {
        $eventos = Evento::all();
        $localidades = Localidad::all();
        return view('boletas.edit', compact('boleta', 'eventos', 'localidades'));
    }

    /**
     * Actualizar boleta en la base de datos.
     */
    public function update(Request $request, Boleta $boleta)
    {
        $validated = $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'localidad_id' => 'required|exists:localidades,id',
            'valor' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
        ]);

        $boleta->update($validated);

        return redirect()->route('boletas.index')->with('success', 'Boleta actualizada exitosamente');
    }

    /**
     * Eliminar boleta.
     */
    public function destroy(Boleta $boleta)
    {
        $boleta->delete();
        return redirect()->route('boletas.index')->with('success', 'Boleta eliminada exitosamente');
    }

    /**
     * Mostrar detalles de una boleta.
     */
    public function show(Boleta $boleta)
    {
        return view('boletas.show', compact('boleta'));
    }
}
