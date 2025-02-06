<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;  
use  App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\Admin\OrderStatusController as AdminOrderStatusController;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/sizeshart', [HomeController::class, 'sizeshart'])->name('sizeshart');
Route::get('/social-media', [HomeController::class, 'socialMedia'])->name('socialmedia');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class);
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shop/{product}/buy', [ShopController::class, 'buy'])->name('shop.buy');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/summary', [CartController::class, 'summary'])->name('cart.summary');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::prefix('admin')->group(function () {
    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/admin/orders/{id}/update-status', [OrderStatusController::class, 'update'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/{id}/latest-status', [OrderStatusController::class, 'getLatestStatus'])->name('admin.orders.latestStatus');
    Route::delete('/admin/orders/{id}', [OrderStatusController::class, 'deleteOrder'])->name('admin.orders.delete');
});
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
