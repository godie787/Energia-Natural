<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

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
    public function obtenerCategorias()
    {
        $categorias = Categoria::all();

        return response()->json($categorias);
    }
    public function obtenerCategoriaPorId($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }


    public function guardarCambiosCategorias(Request $request)
    {
        try {
            // Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'nom_categoria' => 'required|string|max:50',
                'descripcion' => 'string|max:100|nullable',
            ]);

            // Verificar si hay errores de validación
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Obtener el ID de la categoría desde la solicitud
            $categoriaId = $request->input('id_categoria');

            // Encontrar la categoría en la base de datos
            $categoria = Categoria::find($categoriaId);

            // Verificar si la categoría existe
            if ($categoria) {
                // Actualizar los campos
                $categoria->nom_categoria = $request->input('nom_categoria');
                $categoria->descripcion = $request->input('descripcion');
                $categoria->save();

                // Devolver una respuesta de éxito
                return response()->json(['message' => 'Cambios guardados correctamente']);
            } else {
                // Manejar el caso en que la categoría no existe
                return response()->json(['error' => 'La categoría no existe'], 404);
            }
        } catch (\Exception $e) {
            // Manejar cualquier excepción
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function eliminarCategoria($id)
    {
        // Encuentra la categoría por su ID
        $categoria = Categoria::find($id);

        // Verifica si la categoría existe
        if ($categoria) {
            // Verifica si hay productos asociados a la categoría
            if ($categoria->productos()->count() > 0) {
                // Hay productos asociados, no se puede eliminar
                return response()->json(['error' => 'No se puede eliminar la categoría porque tiene productos asociados'], 422);
            }

            // Elimina la categoría
            $categoria->delete();

            // Devuelve una respuesta exitosa
            return response()->json(['message' => 'Categoría eliminada correctamente']);
        }
    }

}