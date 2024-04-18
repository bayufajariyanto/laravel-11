<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [TransaksiController::class, "index"])->name('transaksi.index');
Route::get('/create',       [TransaksiController::class, "create"])->name('transaksi.create');
Route::get('/edit/{id}',    [TransaksiController::class, "edit"])->name('transaksi.edit');
Route::get('/delete/{id}',  [TransaksiController::class, "delete"])->name('transaksi.delete');

Route::post('/transaksi',   [TransaksiController::class, "store"])->name('transaksi.store');
Route::post('/update',      [TransaksiController::class, "update"])->name('transaksi.update');
