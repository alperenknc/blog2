<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konular;
use App\Models\Begeniler;
use App\Models\Yorumlar;
use App\Models\KonuKategori;
use Illuminate\Support\Facades\Auth;
class KonularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public function konu_detay($ad,$id){
        
        $yorumlar=Yorumlar::where('konu_id',$id)->where('durum',1)->get();

        if (Auth::check()) {
            $begenilercount=Begeniler::where('konu_id',$id)->get();
            $begeniyapan=Begeniler::where('konu_id',$id)->where('user_id',Auth::user()->id)->first();
            $konulardetay=Konular::find($id);
            return view('konu_detay',compact('konulardetay','begenilercount','begeniyapan','yorumlar'));
        }
        $begenilercount=Begeniler::where('konu_id',$id)->get();
        $konulardetay=Konular::find($id);
        return view('konu_detay',compact('konulardetay','begenilercount','yorumlar'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
