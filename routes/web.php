<?php

use App\Http\Controllers\AppSectionController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DaerahController;


Route::get('/dashboard', function () {
    return Inertia::render('Main/Admin/Main_Dashboard');
})->name('dashboard');
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login/post', [LoginController::class, 'login'])->name('login.post');
});
Route::get('/registrasi', [LoginController::class, 'registrasi']);
Route::post('/registrasi/store', [LoginController::class, 'storeRegistrasi'])->name('registrasi.store');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/daerah', [DaerahController::class, 'store'])->name('daerah.store');
Route::post('/daerah/{nama_daerah}/herosection/store', [HeroSectionController::class, 'store'])->name('hero.store');
Route::post('/daerah/{nama_daerah}/appsection/store', [AppSectionController::class, 'store'])->name('app.store');
Route::post('/daerah/{nama_daerah}/appsection/{app}', [AppSectionController::class, 'update'])->name('app.update');
Route::post('/daerah/{nama_daerah}/herosection/{app}', [HeroSectionController::class, 'update'])->name('hero.update');
Route::get('/daftarkab', [DaerahController::class, 'index'])->name('index.admin');
Route::post('/daftarkab/{id}', [DaerahController::class, 'update'])->name('daerah.update');
Route::delete('/daftarkab/delete', [DaerahController::class, 'destroy'])->name('delete.daerah');
Route::delete('/daerah/{nama_daerah}/herosection', [DaerahController::class, 'destroyhero'])->name('delete.hero');
Route::delete('/daerah/{nama_daerah}/appsection', [DaerahController::class, 'destroyapp'])->name('delete.app');
Route::get('/daftarkab/search', [DaerahController::class, 'search'])->name('search.index');
Route::get('/daerah/{nama_daerah}/herosection', [DaerahController::class, 'componentHeroSection'])->name('daerah.show.hero');
Route::get('/daerah/{nama_daerah}/appsection', [DaerahController::class, 'componentAppSection'])->name('daerah.show.app');
Route::get('/daerah/{nama_daerah}/footer', [DaerahController::class, 'componentFooterSection'])->name('daerah.show.footer');
