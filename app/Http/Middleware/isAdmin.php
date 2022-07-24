<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1){
            return $next($request);
        }
        return redirect()->route('pages.anasayfa');
    }
}
// class SuperAdmin
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if(!empty(Auth::user())){
//             if(!Auth::user() OR Auth::user()->status != 'super'){
//                 return redirect('/mt-admin/giris-yap');
//             }
//             return $next($request);
//         }
//         return redirect('/mt-admin/giris-yap');
//     }
// }
