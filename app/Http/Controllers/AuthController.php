<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login');
    }

    // Iniciar Sesión comparando texto plano directamente
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        // Validación directa sin métodos Bcrypt automáticos
        if ($user && $user->password === $request->password) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('tablero'); 
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Registro Blindado: Si los datos no cumplen la regla obligatoria, no avanza a la DB
    public function register(Request $request)
    {
        // El validador actúa de freno. Si falta algún campo, cancela todo aquí.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Únicamente si superó con éxito la validación se procede al almacenamiento
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // Guardado directo sin encriptar
        ]);

        return redirect()->route('Login')->with('success', 'Cuenta creada con éxito. Por favor, inicia sesión.');
    }

    // Funciones preparadas para acoplar tus cierres de sesión posteriormente
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}