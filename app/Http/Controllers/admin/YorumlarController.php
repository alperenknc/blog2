<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yorumlar;

class YorumlarController extends Controller
{
    public function index(){
        $yorumlar=yorumlar::all();
        return view('admin.yorumlar.show',compact('yorumlar'));
    }

    public function delete($id){
        yorumlar::find($id)->delete();
        return redirect()->route('admin.yorumlar')->with('ok', 'Yorum Başarı ile Silindi.');
    }
    public function switch(Request $request)
    {
        $kategori=yorumlar::findOrFail($request->id);
        $kategori->durum=$request->statu=="true" ? 1 : 0;
        $kategori->save();
        return "Durum Değitirildi";
    }
}

