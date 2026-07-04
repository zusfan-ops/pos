<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class)->except(['create', 'show']);
    Route::resource('customers', CustomerController::class);
    Route::resource('staff', StaffController::class);

    Route::prefix('pos')->group(function () {
        Route::get('/', [PosController::class, 'index'])->name('pos.index');
        Route::post('/add-to-cart', [PosController::class, 'addToCart'])->name('pos.add-to-cart');
        Route::post('/update-cart', [PosController::class, 'updateCart'])->name('pos.update-cart');
        Route::get('/remove-from-cart/{productId}', [PosController::class, 'removeFromCart'])->name('pos.remove-from-cart');
        Route::post('/checkout', [PosController::class, 'checkout'])->name('pos.checkout');
        Route::get('/receipt/{transaction}', [PosController::class, 'receipt'])->name('pos.receipt');
    });

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
