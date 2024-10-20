<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;

Route::get('/', [PagesController::class, 'index']);

// Admin
Route::get('/Admin', [AdminsController::class, 'index']);
Route::get('/PendataanWarga', [AdminsController::class, 'PendataanWarga']);
Route::get('/PendataanIuran', [AdminsController::class, 'PendataanIuran']);


// User
Route::get('/User', [UsersController::class, 'index']);