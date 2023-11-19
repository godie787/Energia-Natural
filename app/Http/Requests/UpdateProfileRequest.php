<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'nom_usuario' =>'required',
            'fono' => 'nullable',
            'correo' => 'required|email',
            'password' => 'nullable|min:8',
        ];
    }

    public function messages()
    {
        return [
            'nom_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            
            'correo.email'=>'La dirección de correo electrónico debe tener un formato valido',
            'correo.required' => 'La dirección de correo electrónico es obligatoria.',
            'correo.unique' => 'La dirección de correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
            'password_confirmation.same' => 'La confirmación de la contraseña no coincide con la contraseña.',
            'fono.nullable' => 'El teléfono debe ser nulo o estar en un formato válido.',
             
        ];
    }
}
