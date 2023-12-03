<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UpdateUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'nom_usuario' => 'required|unique:usuario,nom_usuario|max:30',
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:80',
            'fono' => 'nullable|max:20',
            'direccion' => 'nullable|max:50',
            'correo' => 'required|email|unique:usuario,correo|max:100',
        ];
    }

    public function messages()
    {
        return [
            'nom_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nom_usuario.unique' => 'El nombre de usuario ya está en uso.',
            'nom_usuario.max' => 'El nombre de usuario no puede tener más de :max caracteres.',
    
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
    
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.max' => 'El campo apellido no puede tener más de :max caracteres.',
    
            'fono.max' => 'El campo teléfono no puede tener más de :max caracteres.',
    
            'direccion.max' => 'El campo dirección no puede tener más de :max caracteres.',
    
            'correo.required' => 'La dirección de correo electrónico es obligatoria.',
            'correo.email' => 'La dirección de correo electrónico debe tener un formato válido.',
            'correo.unique' => 'La dirección de correo electrónico ya está en uso.',
            'correo.max' => 'La dirección de correo electrónico no puede tener más de :max caracteres.',
        ];
    }
}


