<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Category\ControllerCategory;
use App\Http\Controllers\Product\ControllerProduct;

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

Route::get('/categories/create',[ControllerCategory::class,'create'])->name('categories.create');
Route::post('/categories/store',[ControllerCategory::class,'store'])->name('categories.store');
Route::get('/categories/index',[ControllerCategory::class,'index'])->name('categories.index');



Route::get('/products/create',[ControllerProduct::class,'create'])->name('products.create');
Route::post('/products/store',[ControllerProduct::class,'store'])->name('products.store');
Route::get('products/index',[ControllerProduct::class,'index'])->name('products.index');;

Route::get('/', function () {
    return view('welcome');
});
