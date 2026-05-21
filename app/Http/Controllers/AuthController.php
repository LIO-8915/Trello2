<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Carga la pantalla inicial únicamente
    public function showLogin()
    {
        return view('Login');
    }

    // Iniciar Sesión con la DB Local en Texto Plano
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Busca el usuario en la tabla local
        $user = User::where('email', $request->email)->first();

        // Comparación estricta en texto plano
        if ($user && $user->password === $request->password) {
            Auth::login($user); 
            $request->session()->regenerate();
            
            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ]);
    }

    // Registro Seguro: Frena el flujo si faltan campos para evitar el INSERT INTO con nulls
    public function register(Request $request)
    {
        // Si la validación falla, Laravel regresa automáticamente sin tocar la DB
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Guardado directo y limpio en la DB local en texto plano
        User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => $validatedData['password'], 
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