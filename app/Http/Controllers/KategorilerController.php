<?php

namespace App\Http\Controllers;
use App\Models\KonuKategori;
use App\Models\Konular;
use Illuminate\Http\Request;

class KategorilerController extends Controller
{
    public function index(){
        $konukategori=KonuKategori::all();
        return view('kategori',compact('konukategori'));
    }
    public function detay($ad,$id){
        $konular=Konular::where('kategori',$id)->get();
        $kateogi=KonuKategori::find($id);
        $this->ziyaretci_ekle(config('ziyaret.kategori'),$kateogi->id);
        return view('kategori_detay',compact('konular','kateogi'));
    }
}
