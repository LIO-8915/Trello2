<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfiguracionController;

// Redirección inicial
Route::get('/', function () {
    return redirect()->route('Login');
})->name('home'); 

// Módulo de Autenticación Unificado
Route::get('/login', [AuthController::class, 'showLogin'])->name('Login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Vistas privadas protegidas por el Middleware de Autenticación
Route::middleware(['auth'])->group(function () {
    
    Route::get('/tablero', function () {
        return view('tablero');
    })->name('tablero');

    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::get('/config', [ConfiguracionController::class, 'index'])->name('config');
});