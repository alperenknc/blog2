<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(){
        $this->ziyaretci_ekle(config('ziyaret.iletisim'),config('ziyaret.iletisim'));
        return view('contact');
    }
    public function sendmail(Request $request){
        try{
            // dd($request);
            Contact::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);
            
            return redirect()->route('contact')->with('ok', 'Successful , Message Sent');
        }catch(\Throwable $e){ 
            return redirect()->route('contact')->with('no', 'Error , Missing or wrong name operation');
        }
    }
}
