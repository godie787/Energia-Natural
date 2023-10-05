<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $user = auth()->user();
        $categorias = Categoria::all();
        return view('categorias.create', compact('user', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_categoria' => 'required|string|max:50',
            'descripcion' => 'string|max:100|nullable',
        ]);

        // Buscar la categoría por nombre
        $categoriaExistente = Categoria::where('nom_categoria', $request->nom_categoria)->first();

        // Verificar si la categoría ya existe
        if ($categoriaExistente) {
            return redirect()->back()->with('error', 'Esta categoría ya existe.');
        }

        // Crear una nueva categoría sin proporcionar el campo 'id_categoria'
        $categoria = new Categoria([
            'nom_categoria' => $request->nom_categoria,
            'descripcion' => $request->descripcion,
        ]);

        // Guardar la categoría en la base de datos
        $categoria->save();

        return redirect()->back()->with('success', 'Categoría creada con éxito.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_categoria' => 'required|string|max:50',
            'descripcion' => 'string|max:100|nullable',
        ]);

        // Obtener la categoría por ID
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return redirect()->back()->with('error', 'Categoría no encontrada.');
        }

        // Actualizar los campos de la categoría utilizando el método update
        $categoria->update([
            'nom_categoria' => $request->nom_categoria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->back()->with('success', 'Categoría actualizada con éxito.');
}
}