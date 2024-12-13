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
    Route::get('/admin/data_warga', [AdminsController::class, 'data_warga'])->name('data_warga');
    Route::get('/admin/data_iuran', [AdminsController::class, 'data_iuran'])->name('data_iuran');
    Route::post('/admin/pendataan_warga', [RegisterController::class, 'store']);
    Route::post('/admin/pendataan_iuran', [RegisterController::class, 'store_iuran']);
    Route::post('/admin/update_iuran', [AdminsController::class, 'update_iuran']);
    Route::post('/admin/update_warga', [AdminsController::class, 'update_warga']);
    Route::get('/admin/pelaporan', [AdminsController::class, 'pelaporan']);
    Route::get('/admin/edit_warga', [AdminsController::class, 'edit_warga']);
    Route::post('/admin/edit_data_warga', [AdminsController::class, 'edit_data_warga']);
});

// User
Route::middleware(UserMiddleware::class)->group(function () {
    Route::get('/user', [UsersController::class, 'index'])->name('index_warga');
    Route::get('/user/riwayat_iuran', [UsersController::class, 'riwayat_iuran'])->name('riwayat_iuran');
});


Route::get('/about', [AdminsController::class, 'about'])->middleware(AuthMiddleware::class);
Route::post('/logout', [LoginController::class, 'logout'])->middleware(AuthMiddleware::class);

// Login
Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});