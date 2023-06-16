<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\Usuarios_Clientes;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    //
    private $clienteData_construct;
    private $estilos_construct;
    public function __construct()
    {
        $this->estilos_construct = [
            'Pendiente' => 'btn btn-warning',
            'Completada' => 'btn btn-success',
            'Cancelada' => 'btn btn-danger',
        ];
        /* $this->clienteData_construct= */
    }

    public function create(Request $request)
    {
        if (!Auth::check())
            return redirect()->route('user.getLogin')->withErrors("Debe iniciar sesion");

        $clienteData = Cliente::select('id_persona')
            ->where('id_usuario', Auth::user()->id)
            ->first();


        /* dd(Auth::guard('administrador')->user()->id_cliente); */
        //dd(Persona::find(Auth::user()->id));
        $cliente = Persona::find(Auth::user()->id);
        $cliente = Persona::find($clienteData->id_persona);
        //$cliente = Cliente::with('id_usuario')->whereIn('id',Auth::user()->id);
        //cliente = Persona::find(Auth::user()->id);
        //dd($cliente);
        //Contorlar que el usuarios esté autenticado siempre 
        //error ttempt to read property "id_cliente" on null
        //dd(Persona::find(Auth::user()->id));

        //Contorlar que el usuarios esté autenticado siempre 
        //error ttempt to read property "id_cliente" on null

        $tipo_de_cita = DB::table('tipo_de_cita')->select('*')->get();
        return view('reservaCitas', [
            'cliente' => $cliente,
            'datas' => $tipo_de_cita,
        ]);
    }
    public function store(CitaRequest $request)
    {
        //logica para crear cita
        $request->validated();
        //dd($request);
        $clienteData = Cliente::select('*')
            ->where('id_usuario', Auth::user()->id)
            ->first();
        $cita = new Cita;
        //dd($cita, $request);
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->descripcion = $request->descripcion;
        $cita->id_cliente = $clienteData->id;
        $cita->id_tipo_de_cita = 1;
        $cita->save();
        if (Auth::user()->roles->first()->name == 'cliente') {
            return redirect()->route('user.getIndexCita')->with('success', 'Cita creada correctamente');
        }
        if (Auth::user()->roles->first()->name == 'admin') {
            return redirect()->route('admin/home')->with('success', 'Cita creada correctamente');
        }
        //Ahreghar logica de confiormacin através deu na notifaicon
    }
    public function destroy(Cita $cita)
    {
        //$data=$request;
        //dd($data);
        $cita->delete();
        //$data->delete();
        return  redirect()->route('admin.cita.index')->with('success','La cita se ha eliminado correctamente.');
    }
    public function userindex()
    {
        //Agregar where 
        //$citas =  Cita::all();
        $clienteData = Cliente::select('*')
            ->where('id_usuario', Auth::user()->id)
            ->first();
        //Todos los datos de la tabla Cliente 
        //dd($clienteData);
        /* $citas =  DB::table('citas')->
            join('tipo_de_cita', 'citas.id_tipo_de_cita', '=', 'tipo_de_cita.id')->
            join('estado_de_citas', 'citas.id_estado_de_cita', '=', 'estado_de_citas.id')->
            join('clientes','citas.id_cliente','=','clientes.id')->
            where('id_cliente','=',$clienteData->id)->get(); */
        $estilos = [
            'Pendiente' => 'btn btn-warning',
            'Completada' => 'btn btn-success',
            'Cancelada' => 'btn btn-danger',
        ];
        $citas = Cita::select('citas.id as id_cita', 'citas.*', 'tipo_de_cita.*', 'clientes.*', 'estado_de_citas.*')->
            join('clientes', 'citas.id_cliente', '=', 'clientes.id')->
            join('tipo_de_cita', 'citas.id_tipo_de_cita', '=', 'tipo_de_cita.id')->
            join('estado_de_citas', 'citas.id_estado_de_cita', '=', 'estado_de_citas.id')->
            where('id_cliente', '=', $clienteData->id)->
            orderBy('citas.updated_at', 'desc')->get();
        //$citas = Cita::all();
        //dd($citas);
        return view('citas.index', [
            'citas' => $citas,
            'estilos' => $this->estilos_construct,
        ]);
    }
    public function edit(Cita $cita)
    {
        //dd($cita);
        //logica para mejorar detalle de cita
        
        $detalle_cita=  Cita::select(
            'citas.id as id',
            'citas.descripcion',
            'citas.fecha',
            'citas.hora',
            'citas.created_at',
            'tipo_de_cita.tipo_de_cita as tipo_de_cita',
            'estado_de_citas.id as id_estado_de_cita',
            'personas.nombre as persona_nombre',
            'personas.apellido as persona_apellido'
        )
        ->join('tipo_de_cita', 'citas.id_tipo_de_cita', '=', 'tipo_de_cita.id')
        ->join('estado_de_citas', 'citas.id_estado_de_cita', '=', 'estado_de_citas.id')
        ->join('clientes', 'citas.id_cliente', '=', 'clientes.id')
        ->join('personas', 'personas.id', '=', 'clientes.id_persona')
        ->find($cita->id);
        //dd($detalle_cita);
        return view('citas.edit',compact('detalle_cita'));
    }
    public function update (CitaRequest $request, Cita $cita){
        $data=$request->validated();
        $data['id_estado_de_cita']=$request->estado_de_cita;
        //dd($data);
        
        $cita->update($data);
        return  redirect()->route('admin.cita.index')->with('success','La cita se ha actualizado correctamente.');
    }
    public function showIndex()
    {
        //Vista de administrador
        $estilos = [
            'Pendiente' => 'btn btn-warning',
            'Completada' => 'btn btn-success',
            'Cancelada' => 'btn btn-danger',
        ];

        $citas = Cita::select(
            'citas.id as id', 'citas.descripcion', 'citas.fecha', 'citas.hora', 'citas.created_at', 
            'tipo_de_cita.tipo_de_cita as tipo_de_cita', 'estado_de_citas.estado_de_cita as estado_de_cita', 
            'personas.nombre as persona_nombre', 'personas.apellido as persona_apellido')
            ->join('tipo_de_cita', 'citas.id_tipo_de_cita', '=', 'tipo_de_cita.id')
            ->join('estado_de_citas', 'citas.id_estado_de_cita', '=', 'estado_de_citas.id')
            ->join('clientes', 'citas.id_cliente', '=', 'clientes.id')
            ->join('personas', 'personas.id', '=', 'clientes.id_persona')
            ->orderBy('citas.updated_at', 'desc')->get();
        //dd($citas);
        return view('citas.adminIndex')->with([
            'citas' => $citas,
            'estilos' => $estilos,
        ]);
    }


    public function cancelarCita($idCita)
    {
        // Obtener la cita
        $cita = Cita::find($idCita);
        $clienteData = Cliente::select('*')
            ->where('id_usuario', Auth::user()->id)
            ->first();
        //dd($clienteData);
        // Verificar si la cita existe y pertenece al cliente
        if (!$cita || $cita->id_cliente !== $clienteData->id) {
            // La cita no existe o no pertenece al cliente actual
            //dd("Lluegue aqui");
            return redirect()->back()->with('error', 'No se puede cancelar la cita.');
        }

        // Aplicar la lógica de cancelación
        //dd("Estoy en cancelar cita");
        $cita->id_estado_de_cita = '2';
        $cita->save();

        // Otras acciones relacionadas con la cancelación de la cita

        return redirect()->back()->with('success', 'Cita cancelada exitosamente.');
    }
    function actualizarEstado(Cita $cita)
    {
        // Obtener la cita
        $cita = Cita::find($cita->id);
        // Aplicar la lógica de cancelación
        //dd("Estoy en cancelar cita");
        $cita->id_estado_de_cita = '2';
        dd("Logica de actulzaicion de cita");
        //$cita->save();
        return redirect()->back()->with('success', 'Cita cancelada exitosamente.');
    }

}