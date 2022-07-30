<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konular;
use App\Models\KonuKategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class KonularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konular=Konular::all() ?? abort(403, ' Bu sayfa yok dostum ');
        return view('admin.konular.show',compact('konular'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=KonuKategori::all();
        return view('admin.konular.add',compact('kategori'));
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
           
            // $request->validate([
            //     'baslik'=>'required|min:3',
            //     'resim' => 'required|mimes:png,jpg, jpeg, png, bmp, gif,webp,image,svg|max:4048',
            // ]);
            // BU SATIRDA AYNI ISIMDEN KATEGORİ OLUSTURMAMIZI ENGELLIYORUZü
            $isTekrar=Konular::where('baslik',$request->baslik)->first();

            if ($isTekrar) {
                return redirect()->route('konular.create')->with('no', 'Bu başlıkdan şuan bulunmaktadır.');
            }
            else{
            $konular =new Konular;
            $konular->baslik=$request->baslik;
            $konular->slug=Str::slug($request->baslik);
            $konular->yazi=$request->yazi;
            $konular->kategori=$request->kategori;

            if($request->hasFile('resim')){
                $resimN=Str::slug($request->baslik).'.'.$request->resim->getClientOriginalExtension();
                $request->resim->move(public_path('upload/konular/'),$resimN);
                $konular->resim='upload/konular/'.$resimN;
            }
            $konular->save();
            return redirect()->route('konular.create')->with('ok', 'Konu oluşturuldu.');
            }
        }catch(\Throwable $e){
            return "Hata";
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
        $konugetir=Konular::findOrFail($id);
        $kategori=KonuKategori::where('id',$konugetir->kategori)->get();
        $kategoriler=KonuKategori::all();
        return view('admin.konular.edit',compact('konugetir','kategori','kategoriler'));
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
                'resim' => 'mimes:png,jpg, jpeg, png, bmp, gif,webp,image,svg|dimensions:svg|max:4048',
            ]);
            $kategori =Konular::findOrFail($id);
            $kategori->baslik=$request->baslik;
            $kategori->slug=Str::slug($request->baslik);
            $kategori->yazi=$request->yazi;
            $kategori->kategori=$request->kategori;

            if($request->hasFile('resim')){
                $resimN=Str::slug($request->baslik).'.'.$request->resim->getClientOriginalExtension();
                $request->resim->move(public_path('uploads/konular/'),$resimN);
                $kategori->resim='uploads/konular/'.$resimN;
            }
            $kategori->save();
            return redirect()->route('konular.edit',$kategori->id)->with('ok', 'Konu Başarı ile Güncellendi.');
        }catch(\Throwable $e){
            return redirect()->route('konular.edit',$kategori->id)->with('no', 'Hata Konu Güncellenemedi');
        }
    }
    public function delete($id){
        // resimle beraber veriyi silme
        $kategori=Konular::find($id);
        if (File::exists($kategori->resim)) {
            File::delete(public_path($kategori->resim));
        }
        // veri tabanından silme
        Konular::find($id)->delete();
        return redirect()->route('konular.index')->with('ok', 'Konu Başarı ile Silindi.');
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
