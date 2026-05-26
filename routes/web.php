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

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('Login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Registro
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Rutas para Usuarios Autenticados
Route::middleware('auth')->group(function () {
    // Dashboard / Inicio del sistema Trello
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    // Cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});