<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Main/Admin/Main_Dashboard');
});
Route::get('/daftarkab', function () {
    return Inertia::render('Main/Admin/Daftar_Kab');
});
