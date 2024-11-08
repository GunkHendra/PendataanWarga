<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PagesController::class, 'index']);

// Admin
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin', [AdminsController::class, 'index']);
    Route::get('/admin/pendataan_warga', [AdminsController::class, 'pendataan_warga']);
    Route::get('/admin/pendataan_iuran', [AdminsController::class, 'pendataan_iuran']);
    Route::get('/admin/data_warga', [AdminsController::class, 'data_warga']);
    Route::get('/admin/data_iuran', [AdminsController::class, 'data_iuran']);
    Route::post('/admin/pendataan_warga', [RegisterController::class, 'store']);
    Route::post('/admin/pendataan_iuran', [RegisterController::class, 'store_iuran']);
    Route::post('/admin/update_iuran', [AdminsController::class, 'update_iuran']);
    Route::post('/admin/update_warga', [AdminsController::class, 'update_warga']);
});

// User
Route::middleware(UserMiddleware::class)->group(function () {
    Route::get('/user', [UsersController::class, 'index']);
    Route::get('/user/riwayat_iuran', [UsersController::class, 'riwayat_iuran']);
});


Route::post('/logout', [LoginController::class, 'logout'])->middleware(AuthMiddleware::class);

// Login
Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});