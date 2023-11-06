<?php

namespace App\Http\Controllers;

use App\Models\User; // Ajusta el modelo de usuario según tu configuración
use Illuminate\Http\Request;

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

}