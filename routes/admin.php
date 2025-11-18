<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\profilDesa\ProfilDesaController;
use App\Http\Controllers\Admin\UMKMController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;


Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('/profil-desa', ProfilDesaController::class);
        Route::resource('/umkm', UMKMController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/users', UserController::class);

        Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});



