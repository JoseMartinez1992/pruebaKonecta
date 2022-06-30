<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});
//Listar los productos
Route::get('/products', [ProductsController::class, 'index']);
//Guardar productos
Route::post('products', [ProductsController::class, 'store'])->name('products.store');
//Eliminar productos
Route::put('products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');
//Obtener un producto especifico
Route::get('product/{id}',[ProductsController::class, 'getProduct'])->name('products.getProduct');
//Editar producto
Route::put('product/update',[ProductsController::class, 'update'])->name('products.update');
//Lista de todos los productos con stock > 0
Route::get('/products/avalaibles', [ProductsController::class, 'avalaibleProducts'])->name('products.avalaible');
//Envia a la vista para comprar con los datos del producto seleccionado
Route::get('/sale/product/{id}',[SalesController::class, 'getsale'])->name('sales.search');
//Guardar la venta
Route::post('sales', [SalesController::class, 'store'])->name('sales.store');
