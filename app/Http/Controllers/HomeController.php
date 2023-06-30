<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show(Request $request){
        if (Auth::check()) {
            // el usuario está autenticado
            //dd(Auth::user()->roles);
            /* $user = User::findOrFail(Auth::user()->id);
            dd($user->citas->count());
            if( auth()->user()->roles->pluck("name")->first()=="cliente")
                return view('home.index',compact());
            else  */
                return view('home.index');
        } 
        elseif (Auth::guard('administrador')->check()){
            return view('home.clienteHome');
        }
        else {
            echo'no estas autenticado';
            return redirect()->route('/login')->withErrors("Debe iniciar sesion");
        }
       
       /*  $user=Auth::guard('web')->user();
        $user->hasRole('admins');
        $user2=Auth::guard('administrador')->user();
        dd($user2->hasRole('cliente')); */
        
    }

}
