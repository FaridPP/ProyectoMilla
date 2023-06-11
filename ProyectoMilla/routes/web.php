<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducController;

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

Route::get('products/show', [ProducController::class, 'index']);

Route::get('products/create',[ProducController::class, 'create']);

Route::post('/products/store', [ProducController::class, 'store']);

Route::get('/products/edit/{product}', [ProducController::class, 'edit']);

Route::get('/products/update/{product}', [ProducController::class, 'update']);

Route::delete('/products/destroy/{id}', [ProducController::class, 'destroy']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
