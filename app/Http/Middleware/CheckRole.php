<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Si el usuario tiene el rol correcto, permitir el acceso
        if (in_array($user->rol, $roles)) {
            return $next($request);
        }

        // Log para verificar si se ejecuta y qué valores tiene
        \Log::info("Acceso no autorizado para el usuario {$user->nom_usuario} (Rol: {$user->rol})");

        // Redirigir al usuario según el rol
        switch ($user->rol) {
            case 1:
                return redirect('/tienda');
            case 2:
                return redirect('/home');
            default:
                return redirect('/login');
        }
    }
}
