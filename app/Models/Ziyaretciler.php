<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ziyaretciler extends Model
{
    use HasFactory;
    protected $table = 'ziyaret';
    protected $fillable = [
        'ip',
        'useragent',
        'parent',
        'type'
    ];
}
