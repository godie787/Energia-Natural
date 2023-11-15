<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/unauthorized', function () {return view('errors.unauthorized');})->name('unauthorized');

Route::get('/register', [RegisterController::class, 'show'] );
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'] );
Route::post('/login', [LoginController::class, 'login']);


Route::get('/logout', [LogoutController::class, 'logout']);

//rutas cliente
Route::middleware(['auth', 'checkRole:1'])->group(function () {
    Route::get('/tienda/index', [TiendaController::class, 'index'])->name('tienda.index');
    Route::get('/tienda', [ProductoController::class, 'mostrarTienda'])->name('tienda');

    Route::get('/carrito', [ProductoController::class, 'verCarrito']);


});

Route::middleware(['auth', 'checkRole:2'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/productos/form', [ProductoController::class, 'form'])->name('productos.form');
    Route::post('/productos/form', [ProductoController::class, 'store'])->name('productos.guardar');

    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

    Route::get('/productos/editar/{id_producto}', [ProductoController::class, 'edit'])->name('productos.editar');
    Route::put('/productos/{id_producto}', [ProductoController::class, 'update'])->name('productos.update');


    Route::delete('/productos/{id_producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    //rutas para las categorias
    Route::get('/categorias/crear', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias/crear', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::put('/categorias/{id_categoria}/editar', [CategoriaController::class, 'update'])->name('categorias.update');

    //obtener categorias por id
    Route::get('/api/categorias/{id}', [CategoriaController::class, 'obtenerCategoriaPorId'])->name('api.categorias.id');
    //cargar categorias en ventana emergente
    Route::get('/api/categorias', [CategoriaController::class, 'obtenerCategorias'])->name('api.categorias');
    // Guardar cambios en categorías
    Route::post('/api/categorias/guardar', [CategoriaController::class, 'guardarCambiosCategorias'])->name('api.categorias.guardar');
    //eliminar categorias
    Route::delete('/api/categorias/{id}', 'App\Http\Controllers\CategoriaController@eliminarCategoria')->name('api.categorias.eliminar');

    //vista index usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    //
    Route::get('/usuarios/{rut}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{rut}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{rut}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    //busqueda por nombre de usuarios
    Route::get('/usuarios/search', [UsuarioController::class, 'search'])->name('usuarios.search');



});



//rutas para la tienda(cliente)
