<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDeCita extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado_de_cita',
    ];
    public function cita(){
        return $this->hasOne(EstadoDeCita::class);
    }
}
