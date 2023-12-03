<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
class EstadisticasController extends Controller
{
    public function index(){
        $statsPorCategoria = DB::table('venta')
            ->join('producto', 'venta.id_admin_rut', '=', 'producto.rut_admin_creador')
            ->join('categoria', 'producto.id_categoria', '=', 'categoria.id_categoria')
            ->select('categoria.nom_categoria', DB::raw('COUNT(venta.id_venta) as total_ventas'))
            ->groupBy('categoria.nom_categoria')
            ->get();

        // Obtener el ingreso total por mes
        $statsIngresoMensual = DB::table('venta')
            ->select(DB::raw('MONTH(fecha) as mes'), DB::raw('SUM(total) as ingreso_total'))
            ->groupBy(DB::raw('MONTH(fecha)'))
            ->get();


        $ventas = Venta::all();
        $user = auth()->user();
        return view('estadisticas.index', compact('user', 'ventas', 'statsIngresoMensual', 'statsPorCategoria'));

    }
}
