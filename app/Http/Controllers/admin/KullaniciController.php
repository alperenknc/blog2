<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
    
    public function kullanici_kayit(Request $request){
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            ]);
        $isTekrar=User::where('email','=', $request->email)->first();
        if ($isTekrar) {
            return redirect()->back()->with('no', 'Bu E-mail Adresi Zaten Var!!');
            }
        try{

            $register =new User;
            $register->name=$request->name;
            $register->email=$request->email;
            $register->user_ip=$request->ip();
            $register->password=bcrypt($request->password);
            $register->save();

            return redirect()->route('pages.anasayfa')->with('ok', 'Kullanıcı başarıyla oluşturuldu!');
        }catch(\Throwable $th){
            return redirect()->route('pages.anasayfa')->with('no', 'Email adresi veya şifre hatalı!');
        }

    }
}
