<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (){return 'prueba';})->name('api.v1.index');
Route::post('registro',[RegisterController::class, 'store'] )->name('api.v1.register');

// Una forma de generar rutas api
//Route::get('/categorias', [CategoriaController::class, 'index'])->name('api.v1.categorias.index');
//Route::post('/categorias', [CategoriaController::class, 'store'])->name('api.v1.categorias.store');
//Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('api.v1.categorias.show');
//Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('api.v1.categorias.update');
//Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('api.v1.categorias.destroy');

// Segunda forma de generar rutas api

Route::apiResource('categorias', CategoriaController::class)->names('api.v1.categorias');
