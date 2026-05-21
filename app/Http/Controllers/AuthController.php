<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Carga la vista 'Login' al entrar a la raíz del sistema
    public function showLogin()
    {
        return view('Login');
    }

    // Procesa el inicio de sesión y redirige a Welcome en caso de éxito
    public function login(Request $request)
    {        
        echo "<script>
            alert('Entro al validate');
        </script>";
        // Validar que los datos no vengan vacíos
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);
        echo "<script>
            alert('Salio de el validate');
        </script>";

        // Buscar al usuario por correo
        $user = User::where('email', $request->email)->first();

        // Validación estricta en texto plano
        if ($user && $user->password === $request->password) {
            
            // Loguear manualmente en la sesión de Laravel
            Auth::login($user);
            $request->session()->regenerate();
            
            // REDIRECCIÓN CORRECTA: Va directo al menú principal/inicio
            return redirect()->route('welcome');
        }

        // Si falla, regresa al formulario con un mensaje de error
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ]);
    }

    // Registro Blindado: No ejecuta el INSERT si los campos vienen nulos
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => $validatedData['password'], // Texto plano sin Hash
        ]);

        return redirect()->route('Login')->with('success', 'Cuenta creada con éxito. Inicia sesión.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}