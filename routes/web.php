<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UMKM\BuyerController;
use App\Http\Controllers\UMKM\SellerController;


Route::get('/', function () {
    return view('home');
});

Route::get('/profil', function () {
    return view('profil.index');
})->name('profil');

Route::get('/umkm', function () {
    return view('umkm.index');
})->name('umkm');


Route::get('/listing', function () {
    return view('listing');
})->name('listing');



Route::get('/umkm', function () {
    return view('umkm.index');
})->name('umkm.index');

// Login & Register Pembeli
Route::get('/login-buyer', [AuthController::class, 'loginBuyerForm'])->name('login.buyer');
Route::post('/login-buyer', [AuthController::class, 'loginBuyer']);
Route::get('/register-buyer', [AuthController::class, 'registerBuyerForm'])->name('register.buyer');
Route::post('/register-buyer', [AuthController::class, 'registerBuyer']);

// Login & Register Penjual
Route::get('/login-seller', [AuthController::class, 'loginSellerForm'])->name('login.seller');
Route::post('/login-seller', [AuthController::class, 'loginSeller']);
Route::get('/register-seller', [AuthController::class, 'registerSellerForm'])->name('register.seller');
Route::post('/register-seller', [AuthController::class, 'registerSeller']);


// Setelah login
Route::middleware('auth')->group(function () {
    Route::get('/umkm/buyer', [BuyerController::class, 'index'])->name('umkm.buyer.index');
    Route::get('/umkm/seller', [SellerController::class, 'index'])->name('umkm.seller.index');
});














require __DIR__.'/umkm.php';