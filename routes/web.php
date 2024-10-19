<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index']);

Route::get('/PendataanWarga', [PagesController::class, 'PendataanWarga']);

Route::get('/PendataanIuran', [PagesController::class, 'PendataanIuran']);
