<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Spatie\Permission\Traits\HasRoles;
class Cliente extends Model
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    protected $fillable = [
        //Atributos de la tabla
        'id',
        'id_persona',
        'id_usuario',
    ];
    public function persona (){
        return $this->hasOne(Persona::class,'id');
    }
    public function usuario (){
        return $this->hasOne(User::class,'id');
    }
    /* public function citas(){
        return $this->hasMany(Cita::class,'id_cliente');
    } */

}