<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ajusta el modelo de usuario según tu configuración
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $usuarios = User::all(); // Obtén todos los usuarios desde la base de datos
        $search_nombre = $request->input('search_nombre');
        $listadoUsuarios = User::when($request->has('search'), function ($query) use ($request) {
            $query->where('rut', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('rol', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('nom_usuario', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('nombre', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('apellido', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('fono', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('direccion', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('correo', 'like', '%' . $request->input('search') . '%');
        })
        ->get();
        return view('usuarios.index', compact('listadoUsuarios', 'usuarios', 'user'));
    }
    public function edit($rut)
    {
        try {
            $usuario = User::where('rut', $rut)->first();
            if (!$usuario) {
                throw new \Exception("Usuario no encontrado");
            }

            return response()->json(['usuario' => $usuario]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $rut)
    {
        try {
            $usuario = User::where('rut', $rut)->first();
            if (!$usuario) {
                throw new \Exception("Usuario no encontrado");
            }

            // Actualiza los campos del usuario con los datos del formulario
            $usuario->fill($request->all());
            $usuario->save();

            return response()->json(['success' => 'Usuario actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($rut)
    {
        // Lógica para eliminar el usuario con el $rut proporcionado
    }

    public function mostrarPerfil()
    {
        // Obtén los datos del usuario actual (puedes personalizar según tu sistema de autenticación)
        $user = auth()->user();
        $usuarios = User::all();
        return view('tienda.perfil', compact('usuarios', 'user'));
    }
    public function actualizarPerfil(UpdateProfileRequest $request) {
        // Lógica para actualizar el perfil
        
        $user = auth()->user();
    
        // Determina si estás editando el usuario actual o creando uno nuevo
        $editandoUsuarioActual = $request->filled('nom_usuario') && $request->nom_usuario === $user->nom_usuario;
    
        // Define las reglas de validación
        $reglas = [
            'nom_usuario' => $editandoUsuarioActual ? 'required' : 'required|unique:usuario,nom_usuario',
            'nombre' => 'required',
            'password' => $request->filled('password') ? 'min:8' : '',
        ];
    
        // Definir mensajes personalizados
        $messages = [
            'nom_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nom_usuario.unique' => 'El nombre de usuario ya está en uso.',
            'nombre.required' => 'El nombre es obligatorio.',
            
            
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];
    
        // Validación de los campos
        $validator = Validator::make($request->all(), $reglas, $messages);
    
        // Verifica si la validación falla
        if ($validator->fails()) {
            return redirect('/perfil')->withErrors($validator)->withInput();
        }
    
        // Actualiza los campos del modelo excepto la contraseña
        $user->nom_usuario = $request->input('nom_usuario');
        $user->nombre = $request->input('nombre');
        $user->direccion = $request->input('direccion');
        $user->fono = $request->input('fono');
    
        // Verifica si se proporcionó una nueva contraseña antes de actualizarla
        if ($request->filled('password')) {
            $user->password = $request->input('password');
        }
    
        $user->save();
        
        return redirect('/perfil')->with('success', 'Perfil actualizado correctamente');
    }
    

}