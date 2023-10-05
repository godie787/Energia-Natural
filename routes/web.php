<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
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

Route::get('/register', [RegisterController::class, 'show'] );
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'] );
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/productos/form', [ProductoController::class, 'form'])->name('productos.form');
Route::post('/productos/form', [ProductoController::class, 'store'])->name('productos.guardar');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/editar/{id_producto}', [ProductoController::class, 'edit'])->name('productos.editar');
Route::put('/productos/{id_producto}', [ProductoController::class, 'update'])->name('productos.update');


Route::delete('/productos/{id_producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
