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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::get('/category/{slug}', [\App\Http\Controllers\HomepageController::class,'kategoribyslug']);
Route::get('/produk', [\App\Http\Controllers\HomepageController::class,'produk']);
Route::get('/produk/{id}', [\App\Http\Controllers\HomepageController::class,'produkdetail']);
Route::post('/search',[\App\Http\Controllers\HomepageController::class,'searching']);
Route::get('/all', [\App\Http\Controllers\HomepageController::class,'allProduk']);

Route::group(['prefix' => 'admin','middleware'=>['auth','checkrole:admin']], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index']);
    Route::resource('kategori', \App\Http\Controllers\KategoriController::class);
    Route::get('image', [\App\Http\Controllers\ImageController::class,'index']);
    Route::post('image', [\App\Http\Controllers\ImageController::class,'store']);
    Route::delete('image/{id}', [\App\Http\Controllers\ImageController::class,'destroy']);
    Route::post('imagekategori',[\App\Http\Controllers\KategoriController::class,'uploadimage']);
    Route::delete('imagekategori/{id}', [\App\Http\Controllers\KategoriController::class,'deleteimage']);
    Route::resource('slideshow',\App\Http\Controllers\SlideshowController::class);
});

Route::group(['prefix' => 'seller','middleware'=>['auth','checkrole:seller']], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index']);
    Route::get('profil', [\App\Http\Controllers\UserController::class,'index']);
    Route::get('setting', [\App\Http\Controllers\UserController::class,'setting']);
    Route::resource('produk', \App\Http\Controllers\ProdukController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('promo',\App\Http\Controllers\ProdukPromoController::class);
    Route::get('loadprodukasync/{id}', [\App\Http\Controllers\ProdukController::class,'loadasync']);
    Route::post('produkimage',[\App\Http\Controllers\ProdukController::class,'uploadimage']);
    Route::delete('produkimage/{id}', [\App\Http\Controllers\ProdukController::class,'deleteimage']);
});

Route::group(['middleware'=>'auth'], function() {
    Route::resource('cart', App\Http\Controllers\CartController::class);
    Route::resource('cartdetail', App\Http\Controllers\CartDetailController::class);
    Route::resource('alamatpengiriman', \App\Http\Controllers\AlamatPengirimanController::class);
    Route::get('checkout', [\App\Http\Controllers\CartController::class,'checkout']);
    Route::patch('kosongkan/{id}', [\App\Http\Controllers\CartController::class,'kosongkan']);
    Route::get('/wishlist', [\App\Http\Controllers\WishlistController::class,'index']);
    Route::resource('wishlist', App\Http\Controllers\WishlistController::class);
    Route::get('laporan', [\App\Http\Controllers\LaporanController::class,'index']);
    Route::get('proseslaporan', [\App\Http\Controllers\LaporanController::class,'proses']);
    Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);
    Route::get('/transaksi/{id}/cetak_pdf', [\App\Http\Controllers\TransaksiController::class,'cetak_pdf']);
    
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::view('/cart_detail', 'cart_detail');
Route::view('/account', 'account_set');
Route::view('/dash', 'new_dash');
Route::view('/checkout2', 'checkout');
Route::view('/detail_produk', 'detail_produk');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');