<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KullaniciController extends Controller
{
    public function kullanici_giris(Request $request){
        // dd($request);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>1])) {
            return redirect()->route('admin.panel');
        }
        elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>0])){
            return redirect()->route('pages.anasayfa')->with('ok', 'Giriş Başarılı');
        }
        return redirect()->route('pages.anasayfa')->with('no', 'Email adresi veya şifre hatalı! | Veya Yetkisiz giriş');
    }
    public function kullanici_cikis(){
        Auth::logout();
        return redirect()->route('pages.anasayfa')->with('ok', 'Çıkış Başarılı');
    }
}
