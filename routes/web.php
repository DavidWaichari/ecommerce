<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BrandControler;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProcessorControler;
use App\Http\Controllers\Admin\RoleControler;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
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
Route::post('/cart/update/multiple', [CartController::class, 'updateMultiple'])->name('cart.update_multiple');
route::post('/cart/update-ajax', [CartController::class, 'updateCartAjax'])->name('cart.update.ajax');

// You might also want to add a route for processing the checkout
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout.index');
Route::prefix('/client')->middleware('auth')->group(function () {
    // Checkout route
    Route::get('/account/settings',  [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/orders',  [AccountController::class, 'orders'])->name('account.orders');
});



Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}/details', [OrderController::class, 'details']);
    Route::resource('/products', ProductController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/brands', BrandControler::class);
    Route::resource('/processors', ProcessorControler::class);
    Route::resource('/roles', RoleControler::class);
});
