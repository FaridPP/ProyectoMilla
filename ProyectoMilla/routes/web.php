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

Route::get('products/create',[ProducController::class, 'create']);

Route::post('/products/store', [ProducController::class, 'store']);

Route::get('/products/edit/{product}', [ProducController::class, 'edit']);

Route::put('/products/update/{product}', [ProducController::class, 'update']);

Route::delete('/products/destroy/{id}', [ProducController::class, 'destroy']);

/* Rutas bodegas */

Route::get('bodegas/show', [BodegaController::class, 'index']);

Route::get('bodegas/create',[BodegaController::class, 'create']);

Route::post('/bodegas/store', [BodegaController::class, 'store']);

Route::get('/bodegas/edit/{bodega}', [BodegaController::class, 'edit']);

Route::put('/bodegas/update/{bodega}', [BodegaController::class, 'update']);

Route::delete('/bodegas/destroy/{id}', [BodegaController::class, 'destroy']);

/* Rutas marcas */

Route::get('marcas/show', [MarcaController::class, 'index']);

Route::get('marcas/create',[MarcaController::class, 'create']);

Route::post('/marcas/store', [MarcaController::class, 'store']);

Route::get('/marcas/edit/{marca}', [MarcaController::class, 'edit']);

Route::put('/marcas/update/{marca}', [MarcaController::class, 'update']);

Route::delete('/marcas/destroy/{id}', [MarcaController::class, 'destroy']);

/* Rutas proveedores */

Route::get('/proveedores/show', [ProveedorController::class, 'index']);

Route::get('/proveedores/create',[ProveedorController::class, 'create']);

Route::post('/proveedores/store', [ProveedorController::class, 'store']);

Route::get('/proveedores/edit/{proveedor}', [ProveedorController::class, 'edit']);

Route::put('/proveedores/update/{proveedor}', [ProveedorController::class, 'update']);

Route::delete('/proveedores/destroy/{id}', [ProveedorController::class, 'destroy']);

/* Rutas entradas */

Route::get('/entradas/show', [EntradaController::class, 'index']);

Route::get('/entradas/create',[EntradaController::class, 'create']);

Route::post('/entradas/store', [EntradaController::class, 'store']);

Route::get('/entradas/edit/{entrada}', [EntradaController::class, 'edit']);

Route::put('/entradas/update/{entrada}', [EntradaController::class, 'update']);

Route::delete('/entradas/destroy/{id}', [EntradaController::class, 'destroy']);

/* Rutas salidas */

Route::get('/salidas/show', [SalidaController::class, 'index']);

Route::get('/salidas/create',[SalidaController::class, 'create']);

Route::post('/salidas/store', [SalidaController::class, 'store']);

Route::get('/salidas/edit/{salida}', [SalidaController::class, 'edit']);

Route::put('/salidas/update/{salida}', [SalidaController::class, 'update']);

Route::delete('/salidas/destroy/{id}', [SalidaController::class, 'destroy']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
