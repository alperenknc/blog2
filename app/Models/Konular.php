<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konular extends Model
{
    use HasFactory;
    protected $table = 'konular';
    protected $fillable = [
        'baslik',
        'resim',
        'kategori',
        'yazi',
        'slug',
        'durum',
    ];
    public function kategoriler(){
        return $this->belongsTo(KonuKategori::class, 'kategori');
    }
}
