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

// Redirección principal
Route::get('/', function () {
    return redirect()->route('login');
});

// Protegido por sesión
Route::middleware(['auth.session'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD de autobuses (admin y personal)
    Route::resource('autobuses', AutobusController::class);

    // CRUD de usuarios (solo admin)
    Route::middleware(['admin.only'])->group(function () {
        Route::resource('usuarios', UsuarioController::class);
    });
});