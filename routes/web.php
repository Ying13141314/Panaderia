<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProductoController;
use Illuminate\Support\Facades\Route;
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
    return redirect()->route('productos.index');
});
Route::resource('productos', ProductoController::class);
Route::resource('pedidos', PedidoController::class);
Route::delete('pedidoProducto/{pedidoProducto}', [PedidoProductoController::class,'destroy'])->name('pedidoProducto.destroy');
Route::post('pedidoProducto',[PedidoProductoController::class,'store'])->name('pedidoProducto.store');
Route::get('pedidoProducto/{pedido}', [PedidoProductoController::class,'create'])->name('pedidoProducto.create');