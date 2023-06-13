<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ProducController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProveedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->middleware(['auth']);

/* Rutas productos */
Route::get('products/show', [ProducController::class, 'index']);

Route::get('products/create',[ProducController::class, 'create'])->middleware('admin');

Route::post('/products/store', [ProducController::class, 'store'])->middleware('admin');

Route::get('/products/edit/{product}', [ProducController::class, 'edit'])->middleware('admin');

Route::put('/products/update/{product}', [ProducController::class, 'update'])->middleware('admin');

Route::delete('/products/destroy/{id}', [ProducController::class, 'destroy'])->middleware('admin');

/* Rutas bodegas */

Route::get('bodegas/show', [BodegaController::class, 'index']);

Route::get('bodegas/create',[BodegaController::class, 'create'])->middleware('admin');

Route::match(['get', 'post'], '/bodegas/content', [BodegaController::class, 'show']);

Route::get('/bodegas/content/edit/{bodega}', [BodegaController::class, 'content_edit'])->middleware('admin');

Route::put('/bodegas/content/update/{bodega}', [BodegaController::class, 'content_update'])->middleware('admin');

Route::delete('/bodegas/content/destroy/{id}', [BodegaController::class, 'content_destroy'])->middleware('admin');

Route::post('/bodegas/store', [BodegaController::class, 'store'])->middleware('admin');

Route::get('/bodegas/edit/{bodega}', [BodegaController::class, 'edit'])->middleware('admin');

Route::put('/bodegas/update/{bodega}', [BodegaController::class, 'update'])->middleware('admin');

Route::delete('/bodegas/destroy/{id}', [BodegaController::class, 'destroy'])->middleware('admin');

/* Rutas marcas */

Route::get('marcas/show', [MarcaController::class, 'index']);

Route::get('marcas/create',[MarcaController::class, 'create'])->middleware('admin');

Route::post('/marcas/store', [MarcaController::class, 'store'])->middleware('admin');

Route::get('/marcas/edit/{marca}', [MarcaController::class, 'edit'])->middleware('admin');

Route::put('/marcas/update/{marca}', [MarcaController::class, 'update'])->middleware('admin');

Route::delete('/marcas/destroy/{id}', [MarcaController::class, 'destroy'])->middleware('admin');

/* Rutas proveedores */

Route::get('/proveedores/show', [ProveedorController::class, 'index']);

Route::get('/proveedores/create',[ProveedorController::class, 'create'])->middleware('admin');

Route::post('/proveedores/store', [ProveedorController::class, 'store'])->middleware('admin');

Route::get('/proveedores/edit/{proveedor}', [ProveedorController::class, 'edit'])->middleware('admin');

Route::put('/proveedores/update/{proveedor}', [ProveedorController::class, 'update'])->middleware('admin');

Route::delete('/proveedores/destroy/{id}', [ProveedorController::class, 'destroy'])->middleware('admin');

/* Rutas entradas */

Route::get('/entradas/show', [EntradaController::class, 'index']);

Route::get('/entradas/create',[EntradaController::class, 'create'])->middleware('admin');

Route::post('/entradas/store', [EntradaController::class, 'store'])->middleware('admin');

Route::get('/entradas/edit/{entrada}', [EntradaController::class, 'edit'])->middleware('admin');

Route::put('/entradas/update/{entrada}', [EntradaController::class, 'update'])->middleware('admin');

Route::delete('/entradas/destroy/{id}', [EntradaController::class, 'destroy'])->middleware('admin');

/* Rutas salidas */

Route::get('/salidas/show', [SalidaController::class, 'index']);

Route::get('/salidas/create',[SalidaController::class, 'create'])->middleware('admin');

Route::post('/salidas/store', [SalidaController::class, 'store'])->middleware('admin');

Route::get('/salidas/edit/{salida}', [SalidaController::class, 'edit'])->middleware('admin');

Route::put('/salidas/update/{salida}', [SalidaController::class, 'update'])->middleware('admin');

Route::delete('/salidas/destroy/{id}', [SalidaController::class, 'destroy'])->middleware('admin');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
