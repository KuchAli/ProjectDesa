<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\profilDesa\ProfilDesaController;
use App\Http\Controllers\Admin\UMKMController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KepalaDesaController;


Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

        Route::resource('/umkm', UMKMController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/users', UserController::class);

        Route::prefix('profil-desa')->name('profilDesa.')->group(function () {

            // Visi Misi
            Route::get('/visi-misi', [ProfilDesaController::class, 'visiMisiIndex'])->name('visiMisi.index');
            Route::get('/visi-misi/create', [ProfilDesaController::class, 'visiMisiCreate'])->name('visiMisi.create');
            Route::get('/visi-misi/{id}/edit', [ProfilDesaController::class, 'visiMisiEdit'])->name('visiMisi.edit');
            Route::put('/visi-misi/{id}', [ProfilDesaController::class, 'visiMisiUpdate'])->name('visiMisi.update');
            Route::delete('/visi-misi/{id}', [ProfilDesaController::class, 'visiMisiDestroy'])->name('visiMisi.destroy');
            Route::post('/visi-misi', [ProfilDesaController::class, 'visiMisiStore'])->name('visiMisi.store');
            

            // Bagan
            Route::get('/bagan', [ProfilDesaController::class, 'baganIndex'])->name('bagan.index');
            Route::get('/bagan/create', [ProfilDesaController::class, 'baganCreate'])->name('bagan.create');
            Route::post('/bagan', [ProfilDesaController::class, 'baganStore'])->name('bagan.store');

            // Sejarah
            Route::get('/sejarah', [ProfilDesaController::class, 'sejarahIndex'])->name('sejarah.index');
            Route::get('/sejarah/create', [ProfilDesaController::class, 'sejarahCreate'])->name('sejarah.create');
            Route::post('/sejarah', [ProfilDesaController::class, 'sejarahStore'])->name('sejarah.store');
            Route::get('/sejarah/{id}/edit', [ProfilDesaController::class, 'sejarahEdit'])->name('sejarah.edit');
            Route::put('/sejarah/{id}', [ProfilDesaController::class, 'sejarahUpdate'])->name('sejarah.update');
            Route::delete('/sejarah/{id}', [ProfilDesaController::class, 'sejarahDestroy'])->name('sejarah.destroy');
        });

        Route::resource('/kepala-desa', KepalaDesaController::class);



        Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});



