<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKM\SellerController;
use App\Http\Controllers\UMKM\BuyerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UMKM\Profil\ProfilSellerController;
use App\Http\Controllers\UMKM\Profil\ProfilBuyerController;
use App\Models\Product;

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
        Route::put('/{id}', [SellerController::class, 'update'])->name('update');
        Route::delete('/{id}', [SellerController::class, 'destroy'])->name('destroy');

        // ==========================
        // Profil Seller
        // ==========================
            Route::get('/profil', [ProfilSellerController::class, 'index'])->name('profil.index');
            Route::get('/profil/edit', [ProfilSellerController::class, 'edit'])->name('profil.edit');
            Route::put('/profil', [ProfilSellerController::class, 'update'])->name('profil.update');
    });

    // ==========================
    // Pembeli (Buyer) - Wajib Login
    // ==========================
    Route::middleware('auth')->prefix('buyer')->name('buyer.')->group(function () {
        Route::get('/', [BuyerController::class, 'index'])->name('index');
        Route::get('/products', [BuyerController::class, 'products'])->name('products');

        // ==========================
        // Profil Buyer
        // ==========================
        Route::get('/profil', [ProfilBuyerController::class, 'index'])->name('profil.index');
        Route::get('/profil/edit', [ProfilBuyerController::class, 'edit'])->name('profil.edit');
        Route::put('/profil/update', [ProfilBuyerController::class, 'update'])->name('profil.update');
    });
});

// Route logout umum
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
