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
            'nom_usuario' => 'required|unique:administrador,nom_usuario',
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:administrador,rut',
            'correo' => 'required|unique:administrador,correo',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
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
        ];
    }
}
