<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth_Controller extends Controller
{
    // Muestra la vista de login
    public function showLogin()
    {
        return view('Login');
    }

    // Procesa el inicio de sesión
    public function login(Request $request)
    {
        // 1. Validar que lleguen los datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Buscar al usuario manualmente por su correo 
        $user = User::where('email', $request->email)->first();

        // 3. Comparar contraseña en texto plano (SIN HASH)
        if ($user && $user->password == $request->password) {
            Auth::login($user); // Inicia la sesión manualmente en el sistema 
            $request->session()->regenerate();
            
            // 4. Redirigir usando el nombre exacto de la ruta
            return redirect()->route('home'); 
        }

        // Si los datos son incorrectos
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Procesa el registro de un nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirecciona al login con un mensaje de éxito
        return redirect()->route('login')->with('success', 'Cuenta creada. Por favor, inicia sesión.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}