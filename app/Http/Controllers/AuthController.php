<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // <-- CORREGIDO: Importación correcta para encriptar

class AuthController extends Controller
{
    // Carga la pantalla inicial únicamente
    public function showLogin()
    {
        return view('Login');
    }

    // Iniciar Sesión de forma Segura (Validando el Hash de la DB)
    public function login(Request $request)
    {
        // 1. Validar que los campos no vengan vacíos
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Auth::attempt busca el email y compara automáticamente 
        // la contraseña usando Hash::check detrás de escena.
        if (Auth::attempt($credentials)) {
            // Regenera la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();
            
            return redirect()->route('welcome');
        }

        // Si falla, regresa con el mensaje de error
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->withInput($request->only('email')); // Mantiene el correo escrito por comodidad
    }

    // Registro Seguro con Encriptación Estándar
    public function register(Request $request)
    {
        // Si la validación falla, Laravel regresa automáticamente sin tocar la DB
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Guardado seguro encriptando la contraseña
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Encriptación correcta
        ]);

        return redirect()->route('Login')->with('success', 'Cuenta creada con éxito. ¡Ya puedes iniciar sesión!');
    }

    // Cierre de Sesión (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('Login');
    }
}