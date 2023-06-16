<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginClienteRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginClienteController extends Controller
{
    //protected $guard='usuarios_clientes';
    public function show (){
        return view('auth.loginCliente');
    }
    
  /*   public function login (Request $request){
        //Validar datos
        DB::enableQueryLog();
        
        $credentials =$request->only('username','password');      
        if (Auth::guard('administrador')->attempt($credentials)){
            return redirect()->intended(route('user.getHome')); 
            ##echo "Iniciaste sesion como CLIENTE";
        }else{
            //dd(DB::getQueryLog());
            ##return print_r( Auth::guard('admin')->attempt($credentials));
            ##print_r($credentials);
            ##print_r(Auth::guard('admin')->getLastAttempted()); 
            return redirect()->intended('/loginCliente')->withErrors('Algo salio mal :(');
        }

        
    }  */



 
  public function login (LoginClienteRequest $request){
    $credentials = $request->getCredentials();

/*     if (!Auth::guard('administrador')->attempt($credentials)){
        return redirect()->to('/login')->withErrors('Algo salió mal :(');
    }

    $user = Auth::guard('administrador')->getProvider()->retrieveByCredentials($credentials);
    Auth::guard('administrador')->login($user);
    return $this->authenticated($request, $user); */
    

    if(!Auth::validate($credentials)){
        return redirect()->to('/login')->withErrors('Algo salio mal :(');
    }
    $user=Auth::getProvider()->retrieveByCredentials($credentials);
    Auth::login($user);
//dd(DB::getQueryLog());
//Get roles
   // dd(Auth::user()->roles->first()->name);
    //dd(Auth::user()->cliente);
    return $this->authenticated($request,$user);
}

public function authenticated (Request $request, $user){
    //dd(Auth::guard('administrador'));
    
    return redirect()->intended(route('user.getHome'));; 
} 
}
