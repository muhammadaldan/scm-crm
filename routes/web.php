<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@index');

Route::prefix('admin')->group(function () {
    Route::resource('/barang', 'App\Http\Controllers\AdminBarangController');
    Route::resource('/pedagang', 'App\Http\Controllers\AdminPedagangController');
    Route::resource('/industri', 'App\Http\Controllers\AdminIndustriController');
    Route::resource('/petani', 'App\Http\Controllers\AdminPetaniController');
    Route::resource('/transaksi', 'App\Http\Controllers\AdminTransaksiController');
})->middleware(['auth', 'verified']);