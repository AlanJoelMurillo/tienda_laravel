<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController; 

Route::get('/mis-pedidos', [OrderController::class, 'index'])
    ->middleware(['auth'])
    ->name('orders.index');

Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout/process', [CartController::class, 'processPayment'])->name('cart.process');

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/carrito/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/carrito/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::get('/tienda', [StoreController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('store.index');

Route::get('/tienda/producto/{product:slug}', [StoreController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('store.show');

Route::resource('categories', CategoryController::class)->middleware('auth');

// Protegemos las rutas para que solo usuarios logueados (admin) puedan gestionar productos
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
