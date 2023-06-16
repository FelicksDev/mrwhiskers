<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table='citas';
    protected $fillable = [
        'fecha',
        'hora',
        'descripcion',
        'id_cliente',//Llave foranea a tipo
        'id_tipo_de_cita',//Llave foranea a client
        'id_estado_de_cita',//Llave foranea a client
    ];
    
}
