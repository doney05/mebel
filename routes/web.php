<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProductCustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('dashboard/{id}', [ProductCustomerController::class, 'index'])->name('dashboard');
Route::get('produk/{id}', [ProductCustomerController::class, 'product'])->name('product');
Route::get('product-detail/{id}', [ProductCustomerController::class, 'productdetail'])->name('product.detail');
Route::get('add-to-cart/{id}', [ProductCustomerController::class, 'addCart'])->name('add.cart');
Route::get('keranjang/{id}', [ProductCustomerController::class, 'cart'])->name('cart');

//Get city
// Route::get('getcity/{id}', 'ProductCustomerController@getCity');
Route::get('getcity/{id}', [ProductCustomerController::class, 'getCity'])->name('getcity');

//Update Cart
Route::post('update-to-cart/{id}', [ProductCustomerController::class, 'updateCart'])->name('update-to-cart');
Route::delete('delete-from-cart/{id}', [ProductCustomerController::class, 'deleteCart'])->name('delete-from-cart');

//Pesan (Checkout)
Route::get('checkout/index/{id}', [PesananController::class, 'checkout'])->name('checkout');
Route::post('checkout/{id}', [PesananController::class, 'index'])->name('checkout.index');

//Route Cek Ongkir
Route::get('get-ongkir/{id}', [PesananController::class, 'cekOngkir'])->name('get-ongkir');
Route::post('simpan-ongkir/{id}', [PesananController::class, 'saveOngkir'])->name('simpan-ongkir');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);

    //product
    Route::get('admin/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::get('redirect-google', [GoogleController::class, 'redirectGoogle'])->name('redirect-google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google-login-callback');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
