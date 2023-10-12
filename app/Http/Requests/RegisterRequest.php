<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nom_usuario' => 'required|unique:usuario,nom_usuario',
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:usuario,rut',
            'correo' => 'required|unique:usuario,correo',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'fono' => 'nullable', // Añadido para permitir valores nulos
            'direccion' => 'nullable', // Añadido para permitir valores nulos
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nom_usuario.unique' => 'El nombre de usuario ya está en uso.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'rut.required' => 'El RUT es obligatorio.',
            'rut.unique' => 'El RUT ya está en uso.',
            'correo.required' => 'La dirección de correo electrónico es obligatoria.',
            'correo.unique' => 'La dirección de correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
            'password_confirmation.same' => 'La confirmación de la contraseña no coincide con la contraseña.',
            'fono.nullable' => 'El teléfono debe ser nulo o estar en un formato válido.',
            'direccion.nullable' => 'La dirección debe ser nula o estar en un formato válido.',
        ];
    }

}
