<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yorumlar;
use App\Models\Konular;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YorumlarController extends Controller
{
    
    
    public function yorum(Request $request)
    {
        try {
            $request->validate([
                'mesaj'=>'required|min:3|max:500',
            ]);
            $konu=Konular::where('id',$request->konu_id)->first();
            $konubaslik=Str::slug($konu->baslik);
                if (Auth::check()) {
                    $yorum =new Yorumlar;
                    $yorum->konu_id=$request->konu_id;
                    $yorum->user_id=Auth::user()->id;
                    $yorum->mesaj=$request->mesaj;
                    $yorum->save();
                    return redirect()->route('pages.konu.detay',[$konubaslik,$request->konu_id])->with('ok', 'Successful, Comment Successful (Now Wait for Approval...',200);
                }
            } 
        catch (\Throwable $th) {
            return redirect()->route('pages.konu.detay',[$konubaslik,$request->konu_id])->with('no', 'Error, An Error Occurred While Commenting',500);
            }
    }

}
