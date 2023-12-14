<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Obtener todas las ventas despachadas o entregadas en tienda
        $ventasDespachadas = Venta::whereIn('estado', ['Despachada', 'Entregada en tienda'])->get();

        $statsPorCategoria = Categoria::join('producto', 'categoria.id_categoria', '=', 'producto.id_categoria')
            ->join('detalle_venta', 'producto.id_producto', '=', 'detalle_venta.id_producto')
            ->join('venta', 'detalle_venta.id_venta', '=', 'venta.id_venta')
            ->whereIn('venta.estado', ['Despachada', 'Entregada en tienda']) // Ajusta aquí
            ->select('categoria.nom_categoria', DB::raw('COUNT(venta.id_venta) as total_ventas'))
            ->groupBy('categoria.nom_categoria')
            ->get();

        // Obtener el ingreso total por mes para las ventas despachadas o entregadas en tienda
        $statsIngresoMensual = Venta::whereIn('estado', ['Despachada', 'Entregada en tienda'])
            ->groupBy(DB::raw('MONTH(fecha)'))
            ->select(DB::raw('MONTH(fecha) as mes'), DB::raw('SUM(total) as ingreso_total'))
            ->get();

        $user = auth()->user();
        return view('estadisticas.index', compact('user', 'ventasDespachadas', 'statsIngresoMensual', 'statsPorCategoria'));
    }

}
