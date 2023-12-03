<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check() && request()->is('login')) {
            Auth::logout();
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        Log::info('Intento de inicio de sesión: ' . json_encode(['credentials' => $credentials]));

        // Obtén al usuario por nombre de usuario o correo electrónico
        $nom_usuario = isset($credentials['nom_usuario']) ? $credentials['nom_usuario'] : null;
        $correo = isset($credentials['correo']) ? $credentials['correo'] : null;

        $user = \App\Models\User::where(function ($query) use ($nom_usuario, $correo) {
            $query->where('nom_usuario', $nom_usuario)
                ->orWhere('correo', $correo);
        })->first();

        // Verifica si el usuario existe y la contraseña coincide
        if ($user && $request->password == $user->password) {
            // Autenticar al usuario
            Auth::login($user);
            Log::info('Inicio de sesión exitoso: ' . json_encode(['credentials' => $credentials]));
            // Resto del código para redirección y mensajes de éxito
            return redirect('/home')->with('success', "Bienvenido, {$user->nombre}, estás autenticado correctamente.")
                ->header('Refresh', '0');
        } else {
            // Lógica cuando falla la autenticación
            Log::warning('Fallo de autenticación: ' . json_encode(['credentials' => $credentials]));
            return redirect()->to('/login')->withErrors('Credenciales no válidas');
        }
    }


    public function authenticated(Request $request, $user)
    {
        $this->verCompras();
        if ($user->rol ==1){
            return redirect()->route('tienda');
        }elseif ($user->rol ==2){
            return redirect()->route('home');
        }
        //Log::info('Usuario autenticado correctamente:', ['user_id' => $user->id, 'nombre' => $user->nombre]);

        //return view('home.index', ['user' => $user]);
    }
}
