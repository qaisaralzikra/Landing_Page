<?php

use App\Http\Controllers\AppSectionController;
use App\Http\Controllers\HeroSectionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DaerahController;


Route::get('/dashboard', function () {
    return Inertia::render('Main/Admin/Main_Dashboard');
});

Route::post('/daerah', [DaerahController::class, 'store'])->name('daerah.store');
Route::post('/daerah/{nama_daerah}/herosection/store', [HeroSectionController::class, 'store'])->name('hero.store');
Route::post('/daerah/{nama_daerah}/appsection/store', [AppSectionController::class, 'store'])->name('app.store');
Route::get('/daftarkab', [DaerahController::class, 'index'])->name('index.admin');
Route::get('/daftarkab/search', [DaerahController::class, 'search'])->name('search.index');
Route::get('/daerah/{nama_daerah}', [DaerahController::class, 'showByNama'])->name('daerah.show.nama');
Route::get('/daerah/{nama_daerah}/herosection', [DaerahController::class, 'componentHeroSection'])->name('daerah.show.hero');
Route::get('/daerah/{nama_daerah}/appsection', [DaerahController::class, 'componentAppSection'])->name('daerah.show.app');
Route::get('/daerah/{nama_daerah}/footer', [DaerahController::class, 'showByNama'])->name('daerah.show.footer');
