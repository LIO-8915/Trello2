<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [Auth_Controller::class, 'showLogin'])->name('Login');
Route::post('/login', [Auth_Controller::class, 'login'])->name('postLogin');
Route::post('/logout', [Auth_Controller::class, 'logout'])->name('logout');
Route::post('/register', [Auth_Controller::class, 'register'])->name('register');

Route::get('/', function () {
    return view('welcome');
})->name('home'); 

// Route::get('/login', function () {
//     return view('Login');
// })->name('Login');

Route::get('/tablero', function () {
    return view('tablero');
})->name('tablero');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');


// Route::get('/config', function () {
//     return view('config');
// })->name('config');

use App\Http\Controllers\ConfiguracionController;

Route::get('/config', [ConfiguracionController::class, 'index'])->name('config');
//Route::put('/config', [ConfiguracionController::class, 'update'])->name('configuraciones.update');