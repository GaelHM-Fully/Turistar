<?php

namespace App\Http\Controllers;

use App\Models\Autobus;
use App\Models\Usuario;


class DashboardController extends Controller
{
    public function index()
    {
        $totalAutobuses = Autobus::count();
        $totalUsuarios = Usuario::count();

        return view('dashboard', compact('totalAutobuses', 'totalUsuarios'));
    }
}
