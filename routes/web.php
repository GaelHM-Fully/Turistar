<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutobusController;

// Público
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registro público desde login
Route::get('/registro', [UsuarioController::class, 'registroPublico'])->name('registro.publico');
Route::post('/registro', [UsuarioController::class, 'guardarRegistroPublico'])->name('registro.publico.store');

// Redirección principal
Route::get('/', function () {
    return redirect()->route('login');
});

// Protegido por sesión
Route::middleware(['auth.session'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD de autobuses (admin y personal)
    Route::resource('autobuses', AutobusController::class);

    // Solo admin
    Route::middleware(['admin.only'])->group(function () {
        Route::resource('usuarios', UsuarioController::class);
    });
});