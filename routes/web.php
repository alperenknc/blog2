<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonularController;
use App\Http\Controllers\BegenilerController;
use App\Http\Controllers\YorumlarController;
use App\Http\Controllers\KategorilerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;


require_once 'admin.php';
// --------------------------------------------------------------------------//
// Ana Sayfa
Route::get('/', [HomeController::class, 'index'])->name('pages.anasayfa');
Route::get('/konu_detay/{ad}/{id}', [KonularController::class, 'konu_detay'])->name('pages.konu.detay');

Route::get('/begeni', [BegenilerController::class, 'begeni'])->name('begeni');
Route::post('/yorumlar', [YorumlarController::class, 'yorum'])->name('yorum');//yetki ayarla
Route::get('/kategoriler', [KategorilerController::class, 'index'])->name('pages.kategoriler');
Route::get('/kategori/{ad}/{id}', [KategorilerController::class, 'detay'])->name('pages.kategoriler.detay');

// Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
// Route::post('/iletisim', [ContactController::class, 'sendmail'])->name('contact.post');

Route::get('/serach', [SearchController::class, 'search'])->name('search');



