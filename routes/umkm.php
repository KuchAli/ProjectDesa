<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKM\SellerController;
use App\Http\Controllers\UMKM\BuyerController;
use App\Http\Controllers\AuthController;

Route::prefix('umkm')->group(function () {
    Route::get('/', function () {
        return view('umkm.index');
    })->name('umkm.index');

    // Penjual
    Route::prefix('seller')->group(function () {
        Route::get('/', [SellerController::class, 'index'])->name('umkm.seller.index');
        Route::get('/create', [SellerController::class, 'create'])->name('umkm.seller.create');
    });

    // Pembeli
    Route::prefix('buyer')->group(function () {
        Route::get('/', [BuyerController::class, 'index'])->name('umkm.buyer.index');
        Route::get('/cart', [BuyerController::class, 'cart'])->name('umkm.buyer.cart');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');