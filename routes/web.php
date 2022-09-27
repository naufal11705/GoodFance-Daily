<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [\App\Http\Controllers\HomePageController::class,'index']);
Route::get('/about', [\App\Http\Controllers\HomePageController::class,'about']);
Route::get('/kontak', [\App\Http\Controllers\HomePageController::class,'kontak']);
Route::get('/category', [\App\Http\Controllers\HomePageController::class,'kategori']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index']);
    
});

Route::resource('kategori', \App\Http\Controllers\KategoriController::class);
Route::resource('produk', \App\Http\Controllers\ProdukController::class);
Route::resource('customer', \App\Http\Controllers\CustomerController::class);
Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/cart', 'cart');
