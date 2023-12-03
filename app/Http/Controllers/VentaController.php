<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index(){

        $ventas = Venta::all();
        $user = auth()->user();
        return view('ventas.index', compact('user', 'ventas'));
    }
}
