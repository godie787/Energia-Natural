<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        // Agrega lógica para mostrar el catálogo, carrito, etc.
        return view('tienda.index');
    }
}

