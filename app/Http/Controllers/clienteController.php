<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class clienteController extends Controller
{
    //  Index para mostrar elementos
    //store guardar
    //update actualizar
    //destroyz eliminar
    //edit modificiar
    public function show()
    {
        return view('auth.registroCliente');
    }
    public function store(Request $request)
    {   
        DB::enableQueryLog();
        $request->validate([
            /* 'nombre' =>'required',
            'apellidos' =>'required',
            'telefono' =>'required',
            'direccion' =>'required',
            'correo' =>'required',
            'cedula_de_identidad' =>'required',
            'username' =>'required',
            'password' =>'required', */
            'correo'=>'required|email',
            'username'=>'required|unique:users,username',
            'password'=>'required|min:8',
            'password_confirmation' =>'required|same:password',
            'nombre' =>'required|',
            'apellidos' =>'required',
            'telefono' =>'required|numeric',
            'direccion' =>'required',
            'cedula_de_identidad' =>'required|unique:personas,cedula_de_identidad',
            
        ]); 
       
        
        $persona = new Persona;
        $persona->nombre = trim($request->nombre);
        $persona->apellido = trim($request->apellidos);
        $persona->telefono = trim($request->telefono);
        $persona->fecha_nac = $request->fecha;//Cambiar por la enterada de fecha
        $persona->direccion = trim($request->direccion);
        $persona->correo = trim($request->correo);
        $persona->cedula_de_identidad = trim($request->cedula_de_identidad);
        $persona->save();

        $usuarioCliente = new User;
        $usuarioCliente->name = $persona->nombre." ".$persona->apellido;
        $usuarioCliente->username = $request->username;
        $usuarioCliente->password = $request->password;
        $usuarioCliente->assignRole('cliente');
        $usuarioCliente->save();
        
        $cliente = new Cliente;
        $cliente->id_persona = $persona->id;
        $cliente->id_usuario = $usuarioCliente->id;
        $cliente->save();
      
        //Debug
        //dd($usuarioCliente);
        //Error atrapado porque no existia el atributo password el html estaba como contrasenia;
        //Todos las inserciones o instancias de Usuarios_Cliente pasan por mutador defuinidos en el modelo
        

        /* PArece que esta bien el hash. Si ese está encriptadn tal vbez el eerro esta en la verificaicon con la bd */
        return redirect()->route('user.getLogin')->with('success', 'Usuario registrado correctamente');
        /* return redirect()->route('registroCli')->with('success', 'nombre registrado Correctamnet'); */
    }

    public function index()
    {
        $cliente = Cliente::all();
        return view('');
    }
}