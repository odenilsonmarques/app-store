<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Category\ControllerCategory;

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

Route::get('/', function () {
    return view('welcome');
});
