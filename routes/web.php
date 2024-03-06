<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

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

Route::get('/list', [ProductController::class, 'list'])->name('product.list');
Route::get('/cart/add', [ProductController::class, 'cartAdd'])->name('product.store');
Route::get('/cart/update/{rowId}/{qty}', [ProductController::class, 'cartUpdate'])->name('product.update');
Route::get('/cart/delete/{rowId}', [ProductController::class, 'cartDelete'])->name('product.delete');
Route::post('/cart/store', [ProductController::class, 'storeCartInDB'])->name('product.storeCartInDB');
Route::get('/bill', [ProductController::class, 'showAllItem'])->name('product.showAllItem');
