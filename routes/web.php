<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;

Route::get('/', [PagesController::class, 'index']);

// Admin
Route::get('/admin', [AdminsController::class, 'index']);
Route::get('/pendataan_warga', [AdminsController::class, 'pendataan_warga']);
Route::get('/pendataan_iuran', [AdminsController::class, 'pendataan_iuran']);
Route::get('/datawarga', [AdminsController::class, 'data_warga']);
Route::get('/dataiuran', [AdminsController::class, 'data_iuran']);


// User
Route::get('/user', [UsersController::class, 'index']);
Route::get('/riwayat_iuran', [UsersController::class, 'riwayat_iuran']);