<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
## Roles
use Spatie\Permission\Traits\HasRoles;

class Usuarios_Clientes extends Authenticatable## Extiende los metodos de validacion de AUth/USER
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    protected $guard_name = 'administrador';
    protected $guard = 'administrador';
    protected $table='usuarios_clientes';
    protected $fillable = [
        'username',
        'password',
        'id_cliente' 
    ];
    public function cliente()
    {
        return $this->hasOne(Cliente::class,'id_cliente');
    }
    protected $hidden=[
        'password',
            'remember_token'
    ];
    public function setPasswordAttribute ($value){
        $this->attributes['password']=Hash::make($value);
    }
    public function guardName(){
        return 'administrador';
    }
    public function getRole(){
        if (Auth::guard('administrador')->check())
        return Auth::guard('administrador')->user()->roles->first()->name;
        else
        return 'No estás autenticado';
    }   
    public function getGuard(){
        return $this->guard_name;
    }
}