<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boleta;
use App\Models\Evento;
use App\Models\Localidad;
use Illuminate\Support\Facades\Auth;

class BoletaController extends Controller
{
    // Listar todas las boletas
    public function index()
    {
        $boletas = Boleta::with('evento', 'localidad')->get();
        return view('boletas.index', compact('boletas'));
    }

    // Mostrar detalle de una boleta
    public function show(Boleta $boleta)
    {
        $boleta->load('evento', 'localidad');
        return view('boletas.show', compact('boleta'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $eventos = Evento::all();
        $localidades = Localidad::all();
        return view('boletas.create', compact('eventos', 'localidades'));
    }

    // Guardar nueva boleta
    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'localidad_id' => 'required|exists:localidades,id',
            'valor' => 'required|numeric|min:0',
            'cantidad_disponible' => 'required|integer|min:0'
        ]);

        Boleta::create($request->all());
        return redirect()->route('boletas.index')->with('success', 'Boleta creada correctamente');
    }

    // Mostrar formulario de edición
    public function edit(Boleta $boleta)
    {
        $eventos = Evento::all();
        $localidades = Localidad::all();
        return view('boletas.edit', compact('boleta', 'eventos', 'localidades'));
    }

    // Actualizar boleta existente
    public function update(Request $request, Boleta $boleta)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'localidad_id' => 'required|exists:localidades,id',
            'valor' => 'required|numeric|min:0',
            'cantidad_disponible' => 'required|integer|min:0'
        ]);

        $boleta->update($request->all());
        return redirect()->route('boletas.index')->with('success', 'Boleta actualizada correctamente');
    }

    // Eliminar boleta
    public function destroy(Boleta $boleta)
    {
        $boleta->delete();
        return redirect()->route('boletas.index')->with('success', 'Boleta eliminada correctamente');
    }

    // Mostrar formulario de compra
    public function comprar(Boleta $boleta)
    {
        return view('boletas.comprar', compact('boleta'));
    }

    // Procesar pago
    public function pagar(Request $request, Boleta $boleta)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1|max:10',
            'metodo_pago' => 'required|string'
        ]);

        $cantidad = $request->cantidad;

        if ($cantidad > $boleta->cantidad_disponible) {
            return back()->with('error', 'No hay suficientes boletas disponibles');
        }

        $valor_total = $boleta->valor * $cantidad;

        // Registrar compra
        $compra = $boleta->compras()->create([
            'user_id' => Auth::id(),
            'documento' => Auth::user()->num_documento,
            'cantidad' => $cantidad,
            'valor_total' => $valor_total,
            'metodo_pago' => $request->metodo_pago,
            'estado' => 'exitosa'
        ]);

        // Descontar boletas disponibles
        $boleta->cantidad_disponible -= $cantidad;
        $boleta->save();

        return redirect()->route('compras.index')->with('success', 'Compra realizada con éxito');
    }
}
