<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\KullaniciController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KonuKategoriController;
use App\Http\Controllers\Controller;

// --------------------------------------------------------------------------//
// Admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/panel', [HomeController::class, 'index'])->name('admin.panel')->middleware('admin');
    Route::resource('konu-kategori', KonuKategoriController::class)->middleware('admin');
    Route::get('/konu-kategori-sil/{id}',[KonuKategoriController::class, 'delete'])->name('delete.konukategori');

    Route::post('/giris', [KullaniciController::class, 'kullanici_giris'])->name('admin.giris.post');
    Route::get('/cikis', [KullaniciController::class, 'kullanici_cikis'])->name('admin.cikis.post');


    // Route::group(['prefix'=>'icerikler'], function() {
    //     Route::get('/', [KullaniciController::class, 'index'])->name('admin.kullanicilar.index')->middleware('kullanici');
    // });

});
