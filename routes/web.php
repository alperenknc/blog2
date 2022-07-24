<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonularController;
use App\Http\Controllers\BegenilerController;

require_once 'admin.php';
// --------------------------------------------------------------------------//
// Ana Sayfa
Route::get('/', [HomeController::class, 'index'])->name('pages.anasayfa');
Route::get('/konu_detay/{ad}/{id}', [KonularController::class, 'konu_detay'])->name('pages.konu.detay');

Route::get('/begeni', [BegenilerController::class, 'begeni'])->name('begeni');
// Route::get('/user', [UserController::class, 'index']);
