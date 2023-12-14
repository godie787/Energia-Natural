<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Venta;
use App\Models\Courrier;
use App\Models\DetalleVenta;
use Illuminate\Database\QueryException;

use Exception;
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

        // Asignar el rut_admin_creador al producto (necesario para la relación)
        $producto->rut_admin_creador = auth()->user()->rut;

        // Guardar los cambios
        $producto->save();

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy($id)
    {
        try {
            $producto = Producto::find($id);
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
        } catch (QueryException $e) {
            return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto. Está asociado a una venta.');
        }
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

        $productos = Producto::with('categoria')
            ->when($request->has('search_nombre'), function ($query) use ($request) {
                $query->where('nom_producto', 'like', '%' . $request->input('search_nombre') . '%');
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

        // Obtén el rut del administrador actualmente autenticado usando el helper auth()
        $rutAdminCreador = auth()->user()->rut;

        // Crear un nuevo producto con los datos del formulario
        $producto = new Producto([
            'nom_producto' => $request->nom_producto,
            'id_categoria' => $request->id_categoria,
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'rut_admin_creador' => $rutAdminCreador,
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


    //mostrar productos en la tienda
    public function mostrarTienda()
    {
        $user = auth()->user();
        $categorias = Categoria::all();
        $productos = Producto::all();

        return view('tienda.index', compact('productos', 'user', 'categorias'));
    }

    // En el método que muestra la vista del carrito
    public function verCarrito()
    {
        // Obtén los productos del carrito (puede ser desde el almacenamiento local o la base de datos)
        $carrito = json_decode(request()->session()->get('carrito'), true) ?? [];

        // Pasa los productos a la vista
        return view('tienda.carrito', ['productos' => $carrito]);
    }
    public function obtenerCategorias()
    {
        $categorias = Categoria::all(); // Obtén categorías únicas de la base de datos
        return view('tienda.index', compact('productos', 'categorias'));
        
    }

    //ordenar por categorias
    public function filtrarProductos(Request $request)
    {
        $categoriaId = $request->input('categoria');
        $user = auth()->user();
        // Obtén los productos según la categoría seleccionada
        $productos = ($categoriaId) ? Producto::where('id_categoria', $categoriaId)->get() : Producto::all();
        $categorias = Categoria::all();
        $categoriaSeleccionada = $request->input('categoria');
        // Pasa los productos y otras variables necesarias a la vista
        return view('tienda.index', compact('productos', 'categorias','categoriaSeleccionada', 'user'));
    }

    //ordenar por precio
    public function ordenarProductos(Request $request)
    {
        $orden = $request->input('orden');
        $user = auth()->user();
        // Obtén los productos según la opción de orden seleccionada
        $productos = ($orden == 'precioAsc') ? Producto::orderBy('precio_venta', 'asc')->get() : Producto::orderBy('precio_venta', 'desc')->get();
        $categorias = Categoria::all();
        $categoriaSeleccionada = $request->input('categoria');
        // Pasa los productos y otras variables necesarias a la vista
        return view('tienda.index', compact('productos', 'categorias','categoriaSeleccionada', 'user'));
    }

    public function actualizarEstadoAgregar(Request $request) {
        $productoId = $request->input('productoId');
    
        $producto = Producto::find($productoId);
        if ($producto) {
            $producto->estado = 0; // Cambiar a 0 al agregar al carrito
            $producto->save();
        }
    
        return response()->json(['message' => 'Estado del producto actualizado correctamente']);
    }
    
    public function actualizarEstadoEliminar(Request $request) {
        $productoId = $request->input('productoId');
    
        $producto = Producto::find($productoId);
        if ($producto) {
            $producto->estado = 1; // Cambiar a 1 al eliminar del carrito
            $producto->save();
        }
    
        return response()->json(['message' => 'Estado del producto actualizado correctamente']);
    }

    public function procesarPago(Request $request)
    {

        
        $carrito = json_decode($request->session()->get('carrito'), true) ?? [];
        $user = auth()->user();

        $direccion = $user->direccion;
        $categorias = Categoria::all();
        $categoriaId = $request->input('categoria');

        // Obtén los productos según la categoría seleccionada
        $productos = ($categoriaId) ? Producto::where('id_categoria', $categoriaId)->get() : Producto::all();

        return view('tienda.pago', compact('carrito', 'categorias', 'categoriaId', 'user', 'productos', 'direccion'));
    }

    public function obtenerDireccionUsuario(Request $request)
    {
        // Obtén la dirección del usuario desde el modelo User
        $direccion = auth()->user()->direccion;

        // Devuelve la dirección como una respuesta JSON
        return response()->json(['direccion' => $direccion]);
    }

    //confirma la transferencia
    
    public function confirmarPago(Request $request)
    {
        try {
            // Obtener datos de la solicitud
            $rutCliente = auth()->user()->rut; // Obtén el rut del cliente autenticado
            $fecha = Carbon::now(); // Obtén la fecha actual con Carbon
            $total = $request->input('total');
            $direccion = $request->input('direccion');
            $productos = $request->input('productos'); // Asume que recibes un array de productos con detalles

            // Log para verificar los valores recibidos
            \Log::info('Valores recibidos en confirmarPago:', [
                'rutCliente' => $rutCliente,
                'fecha' => $fecha,
                'total' => $total,
                'direccion' => $direccion,
                'productos' => $productos,
            ]);

            // Insertar en la base de datos (Venta)
            $venta = Venta::create([
                'id_cliente_rut' => $rutCliente,
                'fecha' => $fecha,
                'total' => $total,
                'direccion_envio' => $direccion,
                'estado' => 'pendiente',
                // Otros campos...
            ]);

            // Insertar en la base de datos (DetalleVenta)
            foreach ($productos as $producto) {
                $detalleVenta = new DetalleVenta([
                    'id_producto' => $producto['id'], // Asume que cada producto tiene un ID
                    'cantidad' => $producto['cantidad'],
                    'precio' => $producto['precio'],
                ]);
                $venta->detalles()->save($detalleVenta);
            }

            // Limpiar el carrito
            Session::forget('carrito');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Manejar el error
            \Log::error('Error al confirmar el pago: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verCompras() {
        $user = auth()->user();
        
        // Obtener compras del usuario con información del courrier
        $compras = Venta::where('id_cliente_rut', $user->rut)
            ->leftJoin('courrier', 'venta.id_courrier', '=', 'courrier.id_courrier')
            ->select('venta.id_venta', 'venta.fecha', 'venta.total', 'venta.num_envio', 'courrier.nombre as nombre_courrier', 'venta.estado') // Incluye 'venta.estado'
            ->get();
        
        return view('tienda.compras', compact('user', 'compras'));
    }
    
    


    
    
    
    
}