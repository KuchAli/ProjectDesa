<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKM\SellerController;
use App\Http\Controllers\UMKM\BuyerController;
use App\Http\Controllers\AuthController;

Route::prefix('umkm')->name('umkm.')->group(function () {
    // Halaman utama UMKM
    Route::get('/', function () {
        return view('umkm.index');
    })->name('index');

    // ==========================
    // Penjual (Seller) - Wajib Login
    // ==========================
    Route::middleware('auth')->prefix('seller')->name('seller.')->group(function () {
        Route::get('/', [SellerController::class, 'index'])->name('index');
        Route::get('/create', [SellerController::class, 'create'])->name('create');
        Route::post('/', [SellerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SellerController::class, 'edit'])->name('edit');
    });

    // ==========================
    // Pembeli (Buyer) - Wajib Login
    // ==========================
    Route::middleware('auth')->prefix('buyer')->name('buyer.')->group(function () {
        Route::get('/', [BuyerController::class, 'index'])->name('index');
        Route::get('/cart', [BuyerController::class, 'cart'])->name('cart');
    });
});

// Route logout umum
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
