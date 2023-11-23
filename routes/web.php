<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

// Definimos las rutas del CRUD de asistentes bajo el middleware de autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tables', TableController::class);
    Route::resource('products', ProductController::class);

    Route::resource('chefs', ChefController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('waiters', WaiterController::class);
    Route::resource('bills', BillController::class);
    Route::resource('cash-registers', CashRegisterController::class);
    Route::resource('roles', RoleController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::post('/login', [UserController::class, 'login'])->name('login');
