<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

// --------------------------------------------------------------------------//
// Ana Sayfa
Route::get('/', [HomeController::class, 'index'])->name('pages.anasayfa');

// Route::get('/user', [UserController::class, 'index']);
