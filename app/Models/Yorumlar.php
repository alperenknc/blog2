<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
    use HasFactory;
    protected $table = 'yorumlar';
    protected $fillable = [
        'konu_id',
        'user_id',
        'mesaj',
        'durum',
    ];
    public function konuid(){
        return $this->belongsTo(Konular::class,'konu_id', 'id');
    }
    public function userid(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
