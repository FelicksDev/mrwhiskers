<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    //
    public function logout (){
        
        /* if (Auth::user()){
            Session::flush();
            Auth::logout();
            return redirect()->to('admin/login');
        }
        if(Auth::guard('administrador')){
            Session::flush();
            Auth::logout();
            return redirect()->to('/login');
        } */
        if (Auth::check()){
            if (Auth::user()->roles->first()->name=='cliente'){
                Session::flush();
                Auth::logout();
                return redirect()->to('/login');
            }
            if (Auth::user()->roles->first()->name=='admin'){
                Session::flush();
                Auth::logout();
                /* return redirect()->to('admin/login'); */
                return redirect()->to('/login');
            }
        }
   
        
    }
}
