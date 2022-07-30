<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KonuKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KonuKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler=KonuKategori::all() ?? abort(403, ' Bu sayfa yok dostum ');
        return view('admin.konukategori.show',compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategoricreat=KonuKategori::all() ?? abort(403, ' Bu sayfa yok dostum ');
        return view('admin.konukategori.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        try{
            
            $request->validate([
                'baslik'=>'required|min:3',
                // 'resim' => 'required|mimes:png,jpg, jpeg, png, bmp, gif,webp,image,svg|dimensions:svg|max:4048',
            ]);
            // BU SATIRDA AYNI ISIMDEN KATEGORİ OLUSTURMAMIZI ENGELLIYORUZ
            $isTekrar=KonuKategori::where('baslik',Str::slug($request->baslik))->first();
            if ($isTekrar) {
                return redirect()->route('konu-kategori.create')->with('no', 'Hata , Konu Kategorisi Zaten Bulunmakta.');
            }
            else{
            $kategori =new KonuKategori;
            $kategori->baslik=$request->baslik;
            $kategori->slug=Str::slug($request->baslik);

            $kategori->save();
            return redirect()->route('konu-kategori.create')->with('ok', 'Başarılı , Konu Kategorisi Oluşturuldu.');
            }
        }catch(\Throwable $e){
            return redirect()->route('konu-kategori.create')->with('no', 'Hata , Konu Kategorisi Oluşturulamadı.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategorigetir=KonuKategori::findOrFail($id);
        return view('admin.konukategori.edit',compact('kategorigetir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            
            $request->validate([
                'baslik'=>'required|min:3',
            ]);
            $kategori =KonuKategori::findOrFail($id);
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
        // if (File::exists($kategori->resim)) {
        //     File::delete(public_path($kategori->resim));
        // }
        // veri tabanından silme
        KonuKategori::find($id)->delete();
        return redirect()->route('konu-kategori.index')->with('ok', 'Başarılı Kategori Silinidi.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
