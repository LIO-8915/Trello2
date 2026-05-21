<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfiguracionController;

// 1. Al abrir la página por primera vez, exige iniciar sesión directamente
Route::get('/', [AuthController::class, 'showLogin'])->name('Login');

// 2. El formulario de inicio de sesión se procesa aquí mediante POST
Route::post('/login', [AuthController::class, 'login'])->name('login.procesar');

// 3. Registro de cuentas (frena inserciones si los datos vienen nulos)
Route::post('/register', [AuthController::class, 'register'])->name('register');

// 4. Cierre de sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// RUTAS PROTEGIDAS: Solo accesibles si el inicio de sesión fue exitoso
Route::middleware(['auth'])->group(function () {
    
    // Pantalla de Inicio / Menú Principal (Welcome)
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