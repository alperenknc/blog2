<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\KullaniciController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KonuKategoriController;
use App\Http\Controllers\admin\KonularController;
use App\Http\Controllers\admin\YorumlarController;

// --------------------------------------------------------------------------//
// Admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/panel', [HomeController::class, 'index'])->name('admin.panel')->middleware('admin');
    Route::resource('konu-kategori', KonuKategoriController::class)->middleware('admin');
    Route::resource('konular', KonularController::class)->middleware('admin');
    Route::get('/konu-kategori-sil/{id}',[KonuKategoriController::class, 'delete'])->name('delete.konukategori')->middleware('admin');
    Route::get('/konu-sil/{id}',[KonularController::class, 'delete'])->name('delete.konu')->middleware('admin');
    // 
    Route::post('/giris', [KullaniciController::class, 'kullanici_giris'])->name('admin.giris.post');
    Route::post('/register', [KullaniciController::class, 'kullanici_kayit'])->name('admin.kayit.post');
    Route::get('/cikis', [KullaniciController::class, 'kullanici_cikis'])->name('admin.cikis.post');
    // 
    Route::get('/yorumlar', [YorumlarController::class, 'index'])->name('admin.yorumlar')->middleware('admin');
    Route::get('/yorum-sil/{id}',[YorumlarController::class, 'delete'])->name('delete.yorum')->middleware('admin');
    Route::get('/switchy',[YorumlarController::class, 'switch'])->name('switchy')->middleware('admin');

    Route::get('/kullanicilar', [KullaniciController::class, 'index'])->name('admin.users')->middleware('admin');
});
