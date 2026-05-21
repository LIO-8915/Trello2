{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Trello.2</title>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        body {
            background: linear-gradient(135deg, #000000 0%, #0a1536 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, "Fira Sans", "Droid Sans", sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .logo-container {
            margin-bottom: 40px;
            font-size: 45px;
            font-weight: bold;
            color: #172b4d;
            display: flex;
            align-items: center;
        }
        .logo-container i { color: #0079bf; margin-right: 10px; }       
        .auth-card {
            background: #ffffff;
            padding: 25px 40px;
            border-radius: 3px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 10px;
            width: 400px;
            box-sizing: border-box;
            text-align: center;
        }
        h1 { color: #5e6c84; font-size: 16px; margin-bottom: 25px; font-weight: bold; }      
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #dfe1e6;
            border-radius: 3px;
            background-color: #fafbfc;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus { outline: none; border-color: #4c9aff; background-color: #ffffff; }    
        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #5aac44;
            color: white;
            border: none;
            border-radius: 3px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .btn-primary:hover { background-color: #61bd4f; }     
        .footer-links {
            margin-top: 20px;
            border-top: 1px solid #dfe1e6;
            padding-top: 20px;
            font-size: 14px;
        }
        .footer-links a { color: #0052cc; text-decoration: none; cursor: pointer; }
        .footer-links a:hover { text-decoration: underline; }
        .alert { padding: 10px; font-size: 13px; border-radius: 3px; margin-bottom: 15px; text-align: left; }
        .alert-danger { background: #ffebe6; color: #bf2600; border: 1px solid #ffbdad; }
        .alert-success { background: #e3fcef; color: #006644; border: 1px solid #abf5d1; }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg border-0" style="width: 22rem; background-color: rgb(28, 28, 28);">
            <div class="card-body p-4">
               


                <div class="text-center mb-4">
                    <i class="bi bi-kanban fs-1 text-primary"></i>
                    <h2 class="mt-2" style="color:  rgb(161, 161, 161);"><i class="fab fa-trello"></i> Trello 2</h2>
                    <p style="color:  rgb(161, 161, 161);">Log in to Trello 2</p>
                </div>
                {{-- SECCIÓN DE INICIO DE SESIÓN --}}
                <div id="login-section">
                    <form action="{{ route('Login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" style="color: rgb(161, 161, 161);">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" style="background-color: rgba(220, 220, 220, 0.33); border-color: transparent; color: white;" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" style="color: rgb(161, 161, 161);">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" style="background-color: rgba(220, 220, 220, 0.33); border-color: transparent; color: white;" required>
                        </div>

                        <button type="submit" class="btn btn-outline-primary w-100 py-2">Iniciar sesión</button>
                    </form>
                    
                    <hr class="my-4">
                    <div class="text-center">
                        <span style="color: rgb(161, 161, 161);">¿No tienes cuenta?</span>
                        <a href="#" class="text-decoration-none ms-1" onclick="toggleAuth()">Regístrate</a>    
                    </div>
                </div>

                {{-- SECCIÓN DE REGISTRO --}}
                <div id="register-section" style="display: none;">
                    <h2 class="mt-2 text-center" style="color: rgb(161, 161, 161); font-size: 20px;">Crear Cuenta</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre completo" style="background-color: rgba(220, 220, 220, 0.33); border-color: transparent; color: white;" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" style="background-color: rgba(220, 220, 220, 0.33); border-color: transparent; color: white;" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña (mín. 8 caracteres)" style="background-color: rgba(220, 220, 220, 0.33); border-color: transparent; color: white;" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 py-2">Registrarse y Volver</button>
                    </form>

                    <hr class="my-4">
                    <div class="text-center">
                        <a onclick="toggleAuth()" class="text-decoration-none ms-1" style="cursor: pointer; color: #4c9aff;">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAuth() {
            const loginSec = document.getElementById('login-section');
            const registerSec = document.getElementById('register-section');
            
            if (loginSec.style.display === "none") {
                loginSec.style.display = "block";
                registerSec.style.display = "none";
                subtitle.innerText = "Log in to Trello 2";
            } else {
                loginSec.style.display = "none";
                registerSec.style.display = "block";
                subtitle.innerText = "Create your account";
            }
        }

        // Si hubo un error de validación en el registro, mantener visible la sección de registro
        @if ($errors->has('name') || $errors->has('password_confirmation'))
            toggleAuth();
        @endif
    </script>


</body>
</html>