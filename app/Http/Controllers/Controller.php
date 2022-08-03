<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Ziyaretciler;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        \View::share('ziyaretciler',Ziyaretciler::orderBy('created_at','desc')->get());
    }

    public function ziyaretci_ekle($t,$p){
        //$p = kategori , $i = id
        try{
            if(!str_contains('bot',strtolower(\Request::header('User-Agent')))){
                Ziyaretciler::create([
                    'ip' => \Request::ip(),
                    'useragent' => \Request::header('User-Agent'),
                    'type' => $t,
                    'parent' => $p
                ]);
            }
        }catch(\Exception $e){

        }
    }
}
