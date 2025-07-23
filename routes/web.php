<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DaerahController;


Route::get('/dashboard', function () {
    return Inertia::render('Main/Admin/Main_Dashboard');
});

Route::post('/daerah', [DaerahController::class, 'store'])->name('daerah.store');
Route::get('/daftarkab', [DaerahController::class, 'index'])->name('index.admin');
Route::get('/daftarkab/search', [DaerahController::class, 'search'])->name('search.index');
Route::get('/daerah/{nama_daerah}', [DaerahController::class, 'showByNama'])->name('daerah.show.nama');
