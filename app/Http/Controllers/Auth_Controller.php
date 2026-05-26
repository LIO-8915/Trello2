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

    public function login(Request $request)
    {
        // 1. Validar que el formulario envíe los datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Intentar traer al usuario desde tu base de datos 'trello2'
        $user = User::where('email', $request->email)->first();

        // 3. Verificar si el usuario existe y si la contraseña coincide (en texto plano o hash)
        if ($user && ($user->contraseña === $request->password || \Illuminate\Support\Facades\Hash::check($request->password, $user->contraseña))) {
            
            // Iniciamos la sesión en el sistema
            Auth::login($user);
            $request->session()->regenerate();
            
            // Redirigimos al tablero pasando el NOMBRE extraído de la base de datos
            return redirect()->route('tablero')->with('login_success_name', $user->nombre); 
        }

        // Si los datos no coinciden en la base de datos, regresa con error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestra base de datos.',
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