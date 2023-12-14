<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Producto;
class TiendaController extends Controller
{
    public function index()
    {
        // Agrega lógica para mostrar el catálogo, carrito, etc.
        return view('tienda.index');
    }

    public function store(){
        $productos = Producto::all();
        $categorias = Categoria::all();
        
        return view('tienda.principal', compact('categorias', 'productos'));
    }
}

