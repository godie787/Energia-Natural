<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index(Request $request){
        $administrador = Auth::user();
        $administrador->update($request->all());
        $user = auth()->user();
        return view('perfilAdmin.index', compact('user', 'administrador'));
    }
    
    public function guardarPerfil(Request $request) {
        $administrador = Auth::user();
    
        // Determina si estás editando el usuario actual o creando uno nuevo
        $editandoUsuarioActual = $request->filled('nom_usuario') && $request->nom_usuario === $administrador->nom_usuario;
    
        // Define las reglas de validación
        $reglas = [
            'nom_usuario' => $editandoUsuarioActual ? 'required' : 'required|unique:usuario,nom_usuario',
            'password' => $request->filled('password') ? 'min:8' : '',
            // ... otras reglas de validación ...
        ];
    
        // Definir mensajes personalizados
        $messages = [
            'nom_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nom_usuario.unique' => 'El nombre de usuario ya está en uso.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            // ... otras definiciones de mensajes personalizados ...
        ];
    
        // Validación de los campos
        $validator = Validator::make($request->all(), $reglas, $messages);
    
        // Verifica si la validación falla
        if ($validator->fails()) {
            return redirect()->route('perfil.admin')->withErrors($validator)->withInput();
        }
    
        // Actualiza los campos del modelo excepto la contraseña
        $administrador->update($request->except('password'));
    
        // Actualiza la contraseña solo si se proporciona una nueva
        if ($request->filled('password')) {
            $administrador->password = $request->password;
            $administrador->save();
        }
    
        // Recargar el usuario actualizado
        $administrador = Auth::user();
    
        return redirect()->route('perfil.admin', compact('administrador'))->with('success', 'Perfil actualizado exitosamente');
    }
    
}
