<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Category\ControllerCategory;
use App\Http\Controllers\Product\ControllerProduct;
use App\Http\Controllers\Home\ControllerHome;
use App\Http\Controllers\Ordered\ControllerOrdered;
use App\Http\Controllers\Site\ControllerSite;
use App\Http\Controllers\Cart\ControllerCart;

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

//route to direct user to loged in sistema
Route::get('/home',[ControllerHome::class,'index'])->name('home.index');
Route::get('/',[ControllerSite::class,'index'])->name('home');

Route::get('/categories/create',[ControllerCategory::class,'create'])->name('categories.create');
Route::post('/categories/store',[ControllerCategory::class,'store'])->name('categories.store');
Route::get('/categories/index',[ControllerCategory::class,'index'])->name('categories.index');

Route::get('/products/create',[ControllerProduct::class,'create'])->name('products.create');
Route::post('/products/store',[ControllerProduct::class,'store'])->name('products.store');
Route::get('products/index',[ControllerProduct::class,'index'])->name('products.index');
Route::get('products/{uuid}/detail',[ControllerProduct::class,'show'])->name('products.show');

Route::get('ordereds/create',[ControllerOrdered::class,'create'])->name('ordereds.create');

Route::post('carts/store',[ControllerCart::class,'store'])->name('carts.store');
Route::get('carts/index',[ControllerCart::class,'index'])->name('carts.index');

// tenho essa rota para deletar
Route::delete('carts/{productId}',[ControllerCart::class,'destroy'])->name('carts.destroy');

// Route::put('carts/{productId}',[ControllerCart::class,'update'])->name('carts.update');

// Route::put('/carts/{productId}', 'ControllerCart@update')->name('carts.update');




// Route::get('/', function () {
//     return view('welcome');
// });


require __DIR__.'/auth.php';
