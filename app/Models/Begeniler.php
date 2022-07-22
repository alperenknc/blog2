<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Begeniler extends Model
{
    use HasFactory;
    protected $table = 'begeniler';
    protected $fillable = [
        'konu_id',
        'user_id',
        'user_ip',
        'durum'
    ];
    // public function konuid(){
    //     return $this->belongsTo(Konular::class, 'konu_id');
    // }
}
