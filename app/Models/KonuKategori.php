<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonuKategori extends Model
{
    use HasFactory;
    protected $table = 'konu_kategori';
    protected $fillable = [
        'baslik',
        'slug',
    ];
}
