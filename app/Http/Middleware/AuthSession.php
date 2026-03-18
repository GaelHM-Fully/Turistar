<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('login')
                ->with('warning', 'Debes iniciar sesión para acceder.');
        }

        return $next($request);
    }
}