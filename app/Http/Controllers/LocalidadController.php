<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    

    public function index()
    {
        $localidades = Localidad::paginate(10);
        return view('localidades.index', compact('localidades'));
    }

    public function create()
    {
        return view('localidades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nombre' => 'required|string|max:255']);
        Localidad::create($data);
        return redirect()->route('localidades.index')->with('success', 'Localidad creada.');
    }

    public function edit(Localidad $localidad)
    {
        return view('localidades.edit', compact('localidad'));
    }

    public function update(Request $request, Localidad $localidad)
    {
        $data = $request->validate(['nombre' => 'required|string|max:255']);
        $localidad->update($data);
        return redirect()->route('localidades.index')->with('success', 'Localidad actualizada.');
    }

    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        return redirect()->route('localidades.index')->with('success', 'Localidad eliminada.');
    }
}
