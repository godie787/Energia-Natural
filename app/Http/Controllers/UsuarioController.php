<?php

namespace App\Http\Controllers;

use App\Models\User; // Ajusta el modelo de usuario según tu configuración
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $usuarios = User::all(); // Obtén todos los usuarios desde la base de datos
        return view('usuarios.index', compact('usuarios', 'user'));
    }
}