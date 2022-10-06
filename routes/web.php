<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\ProdukPromoController;

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

    Route::get('profil', [\App\Http\Controllers\UserController::class,'index']);
    Route::get('setting', [\App\Http\Controllers\UserController::class,'setting']);

    Route::resource('cart', App\Http\Controllers\CartController::class);
    Route::patch('kosongkan/{id}', [\App\Http\Controllers\CartController::class,'kosongkan']);
    Route::resource('cartdetail', App\Http\Controllers\CartDetailController::class);

    Route::get('laporan', [\App\Http\Controllers\LaporanController::class,'index']);
    Route::get('proseslaporan', [\App\Http\Controllers\LaporanController::class,'proses']);

    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
    Route::resource('produk', \App\Http\Controllers\ProdukController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);

    Route::get('image', [\App\Http\Controllers\ImageController::class,'index']);
    Route::post('image', [\App\Http\Controllers\ImageController::class,'store']);
    Route::delete('image/{id}', [\App\Http\Controllers\ImageController::class,'destroy']);
    Route::post('imagekategori',[\App\Http\Controllers\KategoriController::class,'uploadimage']);
    Route::delete('imagekategori/{id}', [\App\Http\Controllers\KategoriController::class,'deleteimage']);
    Route::resource('promo',\App\Http\Controllers\ProdukPromoController::class);
    Route::get('loadprodukasync/{id}', [\App\Http\Controllers\ProdukPromoController::class,'loadasync']);
    Route::resource('slideshow',\App\Http\Controllers\SlideshowController::class);
    Route::resource('wishlist', App\Http\Controllers\WishlistController::class);
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/detail_produk', 'detail_produk');
Route::view('/checkout', 'checkout');
Route::view('/cart_detail', 'cart_detail');
Route::view('/account', 'account_set');

