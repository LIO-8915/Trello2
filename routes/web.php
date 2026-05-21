<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfiguracionController;

// 1. Al abrir la página raíz por primera vez, exige iniciar sesión directamente
Route::get('/', [AuthController::class, 'showLogin'])->name('Login');

// 2. Procesamiento de formularios de acceso y registro
Route::post('/login', [AuthController::class, 'login'])->name('login.procesar');
Route::post('/register', [AuthController::class, 'register'])->name('register.procesar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Rutas Privadas: Protegidas para que solo entren si el login fue exitoso
Route::middleware(['auth'])->group(function () {
    
    // Pantalla de Welcome / Menú Principal de Inicio
    Route::get('/welcome', function () {
        return view('welcome'); 
    })->name('welcome');

    Route::get('/tablero', function () {
        return view('tablero');
    })->name('tablero');

    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::get('/config', [ConfiguracionController::class, 'index'])->name('config');
});