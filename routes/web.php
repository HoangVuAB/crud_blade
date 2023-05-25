<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',function () {
    return view ('admin.dashboard.index');
})->name('dashboard');

//product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/destroy{id}', [ProductController::class, 'destroy'])->name('products.delete');

// Route
Route::get('/users',[UserController::class,'index'])->name('users.index');





