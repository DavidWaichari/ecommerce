<?php

use App\Http\Controllers\Admin\BrandControler;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProcessorControler;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SupplierController;
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

Route::get('/',[GuestController::class, 'welcome'] );
Route::get('/shop',[GuestController::class, 'shop'] );
Route::get('/products/{slug}/details',[GuestController::class, 'productDetails'] )->name('product.details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
route::post('/cart/update-ajax', [CartController::class, 'updateCartAjax'])->name('cart.update.ajax');

// Checkout route
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// You might also want to add a route for processing the checkout
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/brands', BrandControler::class);
    Route::resource('/processors', ProcessorControler::class);
});
