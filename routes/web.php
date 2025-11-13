<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirects
Route::redirect('/persil', '/admin/persil');

// Admin resource routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('persil', \App\Http\Controllers\PersilController::class);
    Route::resource('dokumen-persil', \App\Http\Controllers\DokumenPersilController::class);
    Route::resource('peta-persil', \App\Http\Controllers\PetaPersilController::class);
    Route::resource('sengketa-persil', \App\Http\Controllers\SengketaPersilController::class);
    Route::resource('jenis-penggunaan', \App\Http\Controllers\JenisPenggunaanController::class);
});

Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('/anggota2', function () {
    return view('anggota2');
});

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::resource('products', \App\Http\Controllers\ProductController::class);
