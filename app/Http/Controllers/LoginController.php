<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    
    public function show (){
        return view ('auth.login');
    }
    public function login (LoginRequest $request){
        //DB::enableQueryLog();
        $credentials=$request->getCredentials();
        if(!Auth::validate($credentials)){
            /* if (Auth::user()->roles->first()->name=='cliente'){
                return redirect()->to('admin/login')->withErrors('Algo salio mal :(');
            }
            elseif(Auth::user()->roles->first()->name=='admin'){
                return redirect()->to('admin/login')->withErrors('Algo salio mal :(');
            } */
            return redirect()->to('/login')->withErrors('Algo salio mal :(');
            
        }
        $user=Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
    //dd(DB::getQueryLog())
    //dd(Auth::user()->roles->first());;
        return $this->authenticated($request,$user);
        
    }
    public function authenticated (Request $request, $user  ){
        //dd(Auth::guard());
        return redirect('admin/home');
    }
}
