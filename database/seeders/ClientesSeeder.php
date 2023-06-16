<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = new Persona;
        $persona->nombre='Antonio';
        $persona->apellido='Cruz Garcia';
        $persona->telefono='8907289';
        $persona->fecha_nac='25/2018';
        $persona->direccion='Zona Franca';
        $persona->correo='Antonio@gmail.com';
        $persona->cedula_de_identidad='6152857';
        $persona->save();
        $AntonioUser=new User;
        //$admin->name='Felix Sarmiento';
        //$admin->email='thedarkomf@gmail.com';
        $AntonioUser->username='Antonio';
        $AntonioUser->password='123';
        $AntonioUser->assignRole('cliente');
        $AntonioUser->save();
        $persona2 = new Persona;
        $persona2->nombre='Carlos';
        $persona2->apellido='Manzillas Zaragoza';
        $persona2->telefono='61222';
        $persona2->fecha_nac='20/02/1999';
        $persona2->direccion='Av Libertadores';
        $persona2->correo='Carlos@gmail.com';
        $persona2->cedula_de_identidad='821222';
        $persona->save();
        //$admin->name='Felix Sarmiento';
        //$admin->email='thedarkomf@gmail.com';
        $AntonioUser->username='Antonio';
        $AntonioUser->password='123';
        $AntonioUser->assignRole('cliente');
        $AntonioUser->save();



        $cliente = new Cliente;
        $cliente->id_persona=$persona->id;
        $cliente->id_usuario=$AntonioUser->id;
    
        $cliente->save();
    }
}
