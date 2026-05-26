<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfiguracionController;

Route::get('/config', [ConfiguracionController::class, 'index'])->name('config');
//Route::put('/config', [ConfiguracionController::class, 'update'])->name('configuraciones.update');
//Logan R

use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "¡Conexión exitosa a la base de datos: " . DB::connection()->getDatabaseName() . "!";
    } catch (\Exception $e) {
        return "Error al conectar a la base de datos: " . $e->getMessage();
    }
});