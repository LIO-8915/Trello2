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

    // Iniciar Sesión en Texto Plano
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('tablero'); 
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // REGISTRO BLINDADO: Cero interacción con la DB si viene nulo
    public function register(Request $request)
    {
        // 1. Validar estrictamente. Si falla o viene nulo, Laravel corta el flujo AQUÍ.
        // Jamás pasará a la línea del INSERT INTO.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // 2. Solo si la validación es 100% exitosa y real, se crea el registro en texto plano
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], 
        ]);

        // 3. Redirección con mensaje de éxito
        return redirect()->route('Login')->with('success', '¡Cuenta registrada con éxito! Ya puedes iniciar sesión.');
    }

    // Cierre de sesión listo para usar después
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}