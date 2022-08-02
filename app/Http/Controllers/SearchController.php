<?php

namespace App\Http\Controllers;
use App\Models\Konular;
use App\Models\KonuKategori;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $sonuckonular = Konular::where('baslik','like','%'.$keyword.'%')->orWhere('yazi','like','%'.$keyword.'%')->orderBy('created_at','desc')->get();
        $sonuckategori = KonuKategori::where('baslik','like','%'.$keyword.'%')->orderBy('created_at','desc')->get();
        return view('parts.search',compact('sonuckonular','sonuckategori'));
    }
}
