<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !Hash::check($request->contrasena, $usuario->contrasena)) {
            return back()
                ->with('error', 'Credenciales incorrectas.')
                ->withInput();
        }

        session([
            'usuario_id'     => $usuario->id,
            'usuario_nombre' => $usuario->nombre,
            'usuario_rol'    => $usuario->rol,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Bienvenido al sistema.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login')
            ->with('info', 'Sesión cerrada correctamente.');
    }
}