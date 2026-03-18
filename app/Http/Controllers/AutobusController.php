<?php

namespace App\Http\Controllers;

use App\Models\Autobus;
use Illuminate\Http\Request;

class AutobusController extends Controller
{
    public function index()
    {
        $autobuses = Autobus::orderBy('id', 'desc')->get();
        return view('autobuses.index', compact('autobuses'));
    }

    public function create()
    {
        return view('autobuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'anio' => 'required|integer|min:2000|max:2100',
            'capacidad_pasajeros' => 'required|integer|min:1|max:200',
            'tipo_autobus' => 'required|in:Urbano,Interurbano,Articulado',
        ]);

        Autobus::create([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'anio' => $request->anio,
            'capacidad_pasajeros' => $request->capacidad_pasajeros,
            'tipo_autobus' => $request->tipo_autobus,
        ]);

        return redirect()->route('autobuses.index')
            ->with('success', 'Autobús registrado correctamente.');
    }

    public function edit($id)
    {
        $autobus = Autobus::findOrFail($id);
        return view('autobuses.edit', compact('autobus'));
    }

    public function update(Request $request, $id)
    {
        $autobus = Autobus::findOrFail($id);

        $request->validate([
            'modelo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'anio' => 'required|integer|min:2000|max:2100',
            'capacidad_pasajeros' => 'required|integer|min:1|max:200',
            'tipo_autobus' => 'required|in:Urbano,Interurbano,Articulado',
        ]);

        $autobus->update([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'anio' => $request->anio,
            'capacidad_pasajeros' => $request->capacidad_pasajeros,
            'tipo_autobus' => $request->tipo_autobus,
        ]);

        return redirect()->route('autobuses.index')
            ->with('success', 'Autobús actualizado correctamente.');
    }

    public function destroy($id)
    {
        $autobus = Autobus::findOrFail($id);
        $autobus->delete();

        return redirect()->route('autobuses.index')
            ->with('success', 'Autobús eliminado correctamente.');
    }
}