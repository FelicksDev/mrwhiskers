<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRegisterRequest extends FormRequest
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
            /* 'email'=>'required|unique:users,email',
            'username'=>'required|unique:users,username',
            'password'=>'required|min:2',
            'password_confirmation' =>'required|same:password' */
            'name' =>'required|unique:users,email',
            'apellido' =>'required|unique:users,email',
            'telefono' =>'required|unique:users,email',
            'direccion' =>'required|unique:users,email',
            'email' =>'required',
            'cedula_identidad' =>'required|unique:users,email',
        ];
    }
}
