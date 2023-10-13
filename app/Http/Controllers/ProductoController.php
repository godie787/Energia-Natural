<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function update(Request $request, $id_producto)
    {
        // Aquí obtendremos el producto que se va a actualizar
        $producto = Producto::find($id_producto);

        // Validamos los datos del formulario
        $request->validate([
            'nom_producto' => 'required|string|max:50',
            'id_categoria' => 'required|exists:categoria,id_categoria',
            'descripcion' => 'required|string|max:80',
            'precio_venta' => 'required|numeric|min:0',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Puede ser opcional
            'estado' => 'required|boolean',
        ]);

        // Actualizar los atributos del producto con los nuevos valores
        $producto->nom_producto = $request->nom_producto;
        $producto->id_categoria = $request->id_categoria;
        $producto->descripcion = $request->descripcion;
        $producto->precio_venta = $request->precio_venta;
        $producto->estado = $request->estado;

        // Actualizar la imagen si le damos una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua
            \Storage::delete('public/' . $producto->imagen);

            // Cargar la nueva imagen
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('productos', 'public');
            $producto->imagen = $rutaImagen;
        }

        // Guardar los cambios
        $producto->save();

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
    public function edit($id_producto)
    {
        $user = auth()->user();
        $categorias = Categoria::all();
        $producto = Producto::find($id_producto);
        return view('productos.editar', compact('producto', 'user', 'categorias'));
    }
    public function index(Request $request)
    {
        $user = auth()->user();
        $categorias = Categoria::all();

        $productos = Producto::when($request->has('search_nombre'), function ($query) use ($request) {
                $query->where('nom_producto', 'like', '%' . $request->input('search_nombre') . '%')
                      ->orWhere('id_producto', 'like', '%' . $request->input('search_nombre') . '%')
                      ->orWhere('id_categoria', 'like', '%' . $request->input('search_nombre') . '%')
                      ->orWhere('descripcion', 'like', '%' . $request->input('search_nombre') . '%')
                      ->orWhere('precio_venta', 'like', '%' . $request->input('search_nombre') . '%')
                      ->orWhere('estado', 'like', '%' . $request->input('search_nombre') . '%');
                      
            })
            ->when($request->has('search_categoria') && $request->input('search_categoria') !== 'all', function ($query) use ($request) {
                $query->where('id_categoria', $request->input('search_categoria'));
            })
            ->get();

        return view('productos.index', compact('productos', 'user', 'categorias'));

        $productos = $productosQuery->get();

        return view('productos.index', compact('productos', 'user', 'categorias'));
    }

    public function form()
    {
        $user = auth()->user();
        $categorias = Categoria::all();
        return view('productos.form', compact('user', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_producto' => 'required|string|max:50',
            'id_categoria' => 'required|exists:categoria,id_categoria',
            'descripcion' => 'string|max:200',
            'precio_venta' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'estado' => 'required|boolean',
        ]);

        // Crear un nuevo producto con los datos del formulario
        $producto = new Producto([
            'nom_producto' => $request->nom_producto,
            'id_categoria' => $request->id_categoria,
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'estado' => $request->estado,
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('productos', 'public');
            $producto->imagen = $rutaImagen;
        }

        // Guardar el producto en la base de datos
        $producto->save();
        session()->flash('success', 'Producto creado con éxito');
        // Redireccionar u otros pasos después de guardar
        return back();

    }
}