<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/videojuegos', 
    [VideojuegosController::class, 'index']);

Route::get('/videojuegos/create', 
    [VideojuegosController::class, 'create']);


Route::get('/videojuegos/index', [VideojuegosController::class, 'index']);

Route::get('/videojuegos/create', [VideojuegosController::class, 'create']);