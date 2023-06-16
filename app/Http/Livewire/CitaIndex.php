<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cita;

class CitaIndex extends Component
{
    public $search ='';
    private $estilos = [
        'Pendiente' => 'btn btn-warning',
        'Completada' => 'btn btn-success',
        'Cancelada' => 'btn btn-danger',
    ];
    public function render()
    {
        $citas = $this->consulta();
        $params = $citas->get();
        return view('livewire.cita-index')->with([
            'citas'=> $params,
            'estilos' =>$this->estilos,
            ]);
    }
    private function consulta (){
        $query = Cita::select(
            'citas.id as id', 'citas.descripcion', 'citas.fecha', 'citas.hora', 'citas.created_at', 
            'tipo_de_cita.tipo_de_cita as tipo_de_cita', 'estado_de_citas.estado_de_cita as estado_de_cita', 
            'personas.nombre as persona_nombre', 'personas.apellido as persona_apellido')
            ->join('tipo_de_cita', 'citas.id_tipo_de_cita', '=', 'tipo_de_cita.id')
            ->join('estado_de_citas', 'citas.id_estado_de_cita', '=', 'estado_de_citas.id')
            ->join('clientes', 'citas.id_cliente', '=', 'clientes.id')
            ->join('personas', 'personas.id', '=', 'clientes.id_persona')
            ->orderBy('citas.updated_at', 'desc');
        
        if ($this->search!=''){
            $query->where('personas.nombre','LIKE','%'.$this->search.'%'); 
            
        }
        return $query;
    }

}
 