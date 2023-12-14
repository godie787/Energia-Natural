<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Log;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\EnvioVenta;
use App\Models\Envio;


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
            $numEnvio = $request->input('numEnvio');
            $idCourrier = $request->input('idCourrier');
            $estado = $request->input('estado');
            $rutAdmin = $request->input('rut_admin');
            $idVenta = $request->input('id_venta');

            $venta = Venta::findOrFail($idVenta);

            $venta->update([
                'num_envio' => $numEnvio,
                'id_courrier' => $idCourrier,
                'estado' => $estado,
                'id_admin_rut' => $rutAdmin,
            ]);

            if ($estado === 'Despachada') {
                foreach ($venta->detalles as $detalle) {
                    $producto = Producto::findOrFail($detalle->id_producto);
                    $producto->update(['estado' => 1]);
                }

                $envio = new Envio();
                $envio->num_envio = $numEnvio;
                $envio->id_courrier = $idCourrier;
                $envio->fecha = now();
                $envio->direccion_despacho = 'Dirección de despacho';
                $envio->save();

                $envioVenta = new EnvioVenta();
                $envioVenta->venta()->associate($venta);
                $envioVenta->envio()->associate($envio);
                $envioVenta->save();

                Log::info('Registro en envio y envio_venta creado exitosamente.');
            }

            Log::info('Venta actualizada exitosamente.');

            return response()->json(['mensaje' => 'Guardado exitoso']);
        } catch (\Exception $e) {
            Log::error('Error al actualizar en la base de datos: ' . $e->getMessage());
            return response()->json(['mensaje' => 'Error al actualizar en la base de datos'], 500);
        }
    }



}
