<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Begeniler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BegenilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function begeni(Request $request)
    {   
        $begeniler=Begeniler::get();
        $begeniler->user_id=Auth::user()->id;
        $begenicount=Begeniler::where('konu_id',$request->idkonu)->get();
        $konu =Begeniler::where('konu_id',$request->idkonu)->Where('user_id',$begeniler->user_id)->first();
            if ($konu==null) {
                Begeniler::create([
                    'user_ip' => request()->ip(),
                    'konu_id' => $request->idkonu,
                    'user_id' => $begeniler->user_id,
                    'durum' => 1,
                ]);
                return response()->json(['konu' => $request->idkonu , 'durum'=> 0, 'sonuc'=>'eklendi','taplamb'=>$begenicount->count()+1]);
            }
            else{
                Begeniler::find($konu->id)->delete();
                return response()->json(['konu' => $request->idkonu , 'durum'=> 1, 'sonuc'=>'Silindi','taplamb'=>$begenicount->count()-1]);
            }
    }

}
