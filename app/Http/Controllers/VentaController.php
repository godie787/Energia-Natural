<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function index(){

        $ventas = Venta::all();
        $user = auth()->user();
        $rutAdmin = auth()->user()->rut;
        return view('ventas.index', compact('user', 'ventas', 'rutAdmin'));
    }

    public function guardarModificacion(Request $request)
    {
        try {
            // Obtener los datos del formulario
            $numEnvio = $request->input('numEnvio');
            $idCourrier = $request->input('idCourrier');
            $estado = $request->input('estado');
            $rutAdmin = $request->input('rut_admin'); // Agrega esta línea
    
            $idVenta = $request->input('id_venta');
    
            // Buscar la venta por algún identificador único (puedes ajustar esto según tu aplicación)
            $venta = Venta::findOrFail($idVenta);
    
            // Actualizar los campos
            $venta->num_envio = $numEnvio;
            $venta->id_courrier = $idCourrier;
            $venta->estado = $estado;
    
            // Agregar el rut_admin a la venta
            $venta->id_admin_rut = $rutAdmin;
    
            // Guardar los cambios en la base de datos
            $venta->save();
    
            // Retornar una respuesta de éxito
            return response()->json(['mensaje' => 'Guardado exitoso']);
        } catch (\Exception $e) {
            // Loggear el error con más detalles
            \Log::error('Error al actualizar en la base de datos: ' . $e->getMessage());
    
            // Retornar una respuesta de error
            return response()->json(['mensaje' => 'Error al actualizar en la base de datos'], 500);
        }
    }
}
