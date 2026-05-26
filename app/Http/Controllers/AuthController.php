<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar el formulario de Login
    public function showLogin()
    {
        return view('Login');
    }

    // Mostrar el formulario de Registro
    public function showRegister()
    {
        return view('Register');
    }

    // Procesar el Inicio de Sesión
    public function login(Request $request)
    {
        // Validación estricta de campos presentes
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auth::attempt busca el correo y comprueba la contraseña encriptada de forma automática
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route('welcome');
        }

        // Si las credenciales fallan, regresa con el error
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->withInput($request->only('email'));
    }

    // Procesar el Registro de Cuentas
    public function register(Request $request)
    {
        // Requerimientos estrictos basados en tu esquema SQL de la tabla users
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' requiere un input llamado password_confirmation
        ]);

        // Guardado seguro cumpliendo con los constraints de integridad (NOT NULL)
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Encriptación Bcrypt compatible con tu .sql
        ]);

        // Redirige al Login con un mensaje de éxito en sesión flash
        return redirect()->route('Login')->with('success', '¡Cuenta creada con éxito! Ya puedes iniciar sesión.');
    }

    // Cierre de Sesión Seguro
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Destruir datos de sesión y regenerar token CSRF para el próximo usuario
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('Login');
    }
}