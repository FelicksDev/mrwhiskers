<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Usuarios_Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usuarios_ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $cliente = new Cliente;
        $cliente->nombre='Antonio';
        $cliente->apellidos='Garcia';
        $cliente->telefono='89012361';
        $cliente->direccion='Zona Franca';
        $cliente->correo='Antonio@gmail.com';
        $cliente->cedula_de_identidad='';
        $cliente->save();
 
        
        $usuarioCliente=new Usuarios_Clientes;
        $usuarioCliente->username='Antonio';
        $usuarioCliente->password='123';
        $usuarioCliente->id_cliente=$cliente->id;
        
        $usuarioCliente->assignRole('cliente');
        $usuarioCliente->save();
        

      
        dump($usuarioCliente->hasRole('admin'));


        $cliente2 = new Cliente;
        $cliente2->nombre='Pablo José';
        $cliente2->apellidos='Cruz Lima';
        $cliente2->telefono='74914254';
        $cliente2->direccion='Zona Puente Bolivia';
        $cliente2->correo='JoseCarlos@gmail.com';
        $cliente2->cedula_de_identidad='21511';
        $cliente2->save();

        
        $mascota1 = new Mascota();
        $mascota1->nombre="Firulas";
        $mascota1->raza="criollo";
        $mascota1->año_de_nac="2020";
        $mascota1->id_cliente="1";
        $mascota1->save();


        $mascota2 = new Mascota();
        $mascota2->nombre="Sam";
        $mascota2->raza="criollo";
        $mascota2->año_de_nac="2019";
        $mascota2->id_cliente="1";
        $mascota2->save();


        $usuarioCliente2=new Usuarios_Clientes;
        $usuarioCliente2->username='Pablo';
        $usuarioCliente2->password='123';
        $usuarioCliente2->id_cliente=$cliente2->id;
        $usuarioCliente2->assignRole('cliente');
        $usuarioCliente2->save();
    }
}
