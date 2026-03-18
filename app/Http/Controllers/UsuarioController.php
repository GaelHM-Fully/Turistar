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

    // FORMULARIO QUE USA EL ADMIN
    public function create()
    {
        return view('usuarios.create');
    }

    // GUARDAR USUARIO CREADO POR ADMIN
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:18|max:100',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|string|max:20',
            'turno' => 'required|string',
            'contrasena' => 'required|string|min:6',
        ]);

        $esAdmin = $request->has('es_admin');

        $rol = $esAdmin ? 'admin' : 'personal';
        $puesto = $esAdmin ? 'Administrador' : 'Trabajador de mostrador';

        Usuario::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'turno' => $request->turno,
            'puesto' => $puesto,
            'contrasena' => Hash::make($request->contrasena),
            'rol' => $rol,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado correctamente.');
    }

    // FORMULARIO PUBLICO DESDE LOGIN
    public function registroPublico()
    {
        return view('usuarios.registro_publico');
    }

    // GUARDAR USUARIO DESDE LOGIN
    public function guardarRegistroPublico(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:18|max:100',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|string|max:20',
            'turno' => 'required|string',
            'contrasena' => 'required|string|min:6',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'turno' => $request->turno,
            'puesto' => 'Trabajador de mostrador',
            'contrasena' => Hash::make($request->contrasena),
            'rol' => 'personal',
        ]);

        return redirect()->route('login')
            ->with('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
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
            'contrasena' => 'nullable|string|min:6',
        ]);

        $esAdmin = $request->has('es_admin');

        $usuario->nombre = $request->nombre;
        $usuario->edad = $request->edad;
        $usuario->correo = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->turno = $request->turno;
        $usuario->rol = $esAdmin ? 'admin' : 'personal';
        $usuario->puesto = $esAdmin ? 'Administrador' : 'Trabajador de mostrador';

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