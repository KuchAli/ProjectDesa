<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UMKM\BuyerController;
use App\Http\Controllers\UMKM\SellerController;


Route::view('/', 'home');
Route::view('/profil', 'profil.index')->name('profil');
Route::view('/umkm', 'umkm.index')->name('umkm.index');
Route::view('/listing', 'listing')->name('listing');

// Auth
Route::get('/login-buyer', [AuthController::class, 'loginBuyerForm'])->name('login.buyer');
Route::post('/login-buyer', [AuthController::class, 'loginBuyer']);
Route::get('/register-buyer', [AuthController::class, 'registerBuyerForm'])->name('register.buyer');
Route::post('/register-buyer', [AuthController::class, 'registerBuyer']);

Route::get('/login-seller', [AuthController::class, 'loginSellerForm'])->name('login.seller');
Route::post('/login-seller', [AuthController::class, 'loginSeller']);
Route::get('/register-seller', [AuthController::class, 'registerSellerForm'])->name('register.seller');
Route::post('/register-seller', [AuthController::class, 'registerSeller']);


Route::get('admin/login', [AuthController::class, 'loginAdminForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.process');

require __DIR__.'/umkm.php';
require __DIR__.'/admin.php';
