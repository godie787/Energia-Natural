<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        Log::info('Intento de inicio de sesión: ' . json_encode(['credentials' => $credentials]));

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('Usuario autenticado: ' . json_encode(['user_id' => $user->id_admin, 'nombre' => $user->nombre]));
            return redirect('/home')->with('success', "Bienvenido, {$user->nombre}, estás autenticado correctamente.");
        } else {
            Log::warning('Fallo de autenticación: ' . json_encode(['nom_usuario' => $request->nom_usuario]));
            return redirect()->to('/login')->withErrors('Credenciales no válidas');
        }
    }   

    public function authenticated(Request $request, $user)
    {
        Log::info('Usuario autenticado correctamente:', ['user_id' => $user->id, 'nombre' => $user->nombre]);

        return view('home.index', ['user' => $user]);
    }
}
