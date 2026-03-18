<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:18|max:100',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|string|max:20',
            'turno' => 'required|string',
            'puesto' => 'required|string|max:100',
            'contrasena' => 'required|string|min:6',
            'rol' => 'required|in:admin,personal',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'turno' => $request->turno,
            'puesto' => $request->puesto,
            'contrasena' => Hash::make($request->contrasena),
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado correctamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:18|max:100',
            'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
            'telefono' => 'required|string|max:20',
            'turno' => 'required|string',
            'puesto' => 'required|string|max:100',
            'contrasena' => 'nullable|string|min:6',
            'rol' => 'required|in:admin,personal',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->edad = $request->edad;
        $usuario->correo = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->turno = $request->turno;
        $usuario->puesto = $request->puesto;
        $usuario->rol = $request->rol;

        if ($request->filled('contrasena')) {
            $usuario->contrasena = Hash::make($request->contrasena);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}