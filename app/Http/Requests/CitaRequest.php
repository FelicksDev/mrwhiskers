<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fecha' => 'required',
            'hora' => 'required',
            'descripcion' => 'required|string',
            /* 'id_cliente' => 'required|integer',
            'id_tipo_de_cita' => 'required|integer',
            'id_estado_de_cita' => 'required|integer', */
        ];
    }
}
