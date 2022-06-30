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
Route::get('/products', [ProductsController::class, 'index']);
Route::post('products', [ProductsController::class, 'store'])->name('products.store');
Route::put('products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');
Route::get('product/{id}',[ProductsController::class, 'getProduct'])->name('products.getProduct');
Route::put('product/update',[ProductsController::class, 'update'])->name('products.update');
Route::get('/products/avalaibles', [ProductsController::class, 'avalaibleProducts'])->name('products.avalaible');
Route::get('/sales', [SalesController::class, 'index']);
Route::get('/sale/product/{id}',[SalesController::class, 'getsale'])->name('sales.search');
Route::post('sales', [SalesController::class, 'store'])->name('sales.store');
