<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KonuKategori;
use App\Models\Konular;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KonuKategoriController extends Controller
{
    
    public function index()
    {
        $kategoriler=KonuKategori::all() ?? abort(403, ' Bu sayfa yok dostum ');
        return view('admin.konukategori.show',compact('kategoriler'));
    }
    
    public function create()
    {
        return view('admin.konukategori.add');
    }

    
    public function store(Request $request)
    { 
        try{
            $request->validate([
                'baslik'=>'required|min:3',
            ]);
            // BU SATIRDA AYNI ISIMDEN KATEGORİ OLUSTURMAMIZI ENGELLIYORUZ
            $isTekrar=KonuKategori::where('baslik',Str::slug($request->baslik))->first();
            if ($isTekrar) {
                return redirect()->route('konu-kategori.create')->with('no', 'Hata , Konu Kategorisi Zaten Bulunmakta.');
            }
            else{
            $konular =new KonuKategori;
            if($request->hasFile('resim')){
                $resimN=Str::slug($request->baslik).'.'.$request->resim->getClientOriginalExtension();
                $request->resim->move(public_path('upload/kategoriler/'),$resimN);
                $konular->resim='upload/kategoriler/'.$resimN;
            }
            $konular->baslik=$request->baslik;
            $konular->slug=Str::slug($request->baslik);
            $konular->save();
            return redirect()->route('konu-kategori.create')->with('ok', 'Başarılı , Konu Kategorisi Oluşturuldu.');
            }
        }catch(\Throwable $e){
            return redirect()->route('konu-kategori.create')->with('no', 'Hata , Konu Kategorisi Oluşturulamadı.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategorigetir=KonuKategori::findOrFail($id);
        return view('admin.konukategori.edit',compact('kategorigetir'));
    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'baslik'=>'required|min:3',
            ]);
            $kategori =KonuKategori::findOrFail($id);
          
            if($request->hasFile('resim')){
                $resimN=Str::slug($request->baslik).'.'.$request->resim->getClientOriginalExtension();
                $request->resim->move(public_path('upload/kategoriler/'),$resimN);
                $kategori->resim='upload/kategoriler/'.$resimN;
            }
            $kategori->baslik=$request->baslik;
            $kategori->slug=Str::slug($request->baslik);
            $kategori->save();
            return redirect()->route('konu-kategori.index')->with('ok', 'Başarılı , Konu Kategorisi Güncellendi.');
        }catch(\Throwable $e){
            return redirect()->route('konu-kategori.index')->with('no', 'Hata , Konu Kategorisi Güncellenmedi.');
        }
    }
    public function delete($id){
        // resimle beraber veriyi silme
        $kategori=KonuKategori::find($id);
        if (File::exists($kategori->resim)) {
            File::delete(public_path($kategori->resim));
        }
        $kategori=Konular::where('kategori',$id)->get();
        foreach($kategori as $kategori){
            if (File::exists($kategori->resim)) {
                File::delete(public_path($kategori->resim));
            }
        }
        Konular::where('kategori',$id)->delete();
        KonuKategori::find($id)->delete();
        return redirect()->route('konu-kategori.index')->with('ok', 'Başarılı Kategori Silinidi.');
    }
    
    public function destroy($id)
    {
        //
    }
}
