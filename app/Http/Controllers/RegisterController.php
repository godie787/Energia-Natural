<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class RegisterController extends Controller
{
    protected function validateAndFormatRut($rut)
    {
        // Validar que el RUT tiene el formato correcto
        if (!preg_match('/^[0-9]{1,8}[0-9kK]$/i', $rut)) {
            throw ValidationException::withMessages(['rut' => 'El RUT no tiene un formato válido']);
        }

        // Obtener el dígito verificador
        $dvIngresado = strtoupper(substr($rut, -1));

        // Obtener el número sin el dígito verificador
        $numero = substr($rut, 0, -1);

        // Calcular el dígito verificador esperado
        $dvEsperado = $this->calcularDigitoVerificador($numero);

        // Comparar el dígito verificador ingresado con el esperado
        if ($dvIngresado != $dvEsperado) {
            throw ValidationException::withMessages(['rut' => 'El RUT no es válido']);
        }

        // Verificar si el RUT ya existe en la base de datos
        if (User::where('rut', $numero)->exists()) {
            throw ValidationException::withMessages(['rut' => 'El RUT ya está registrado']);
        }

        // Devolver el RUT sin el dígito verificador
        return (string) $numero;
    }
    protected function calcularDigitoVerificador($numero)
    {
        // Lógica para calcular el dígito verificador
        // Puedes implementar aquí el algoritmo de cálculo del dígito verificador
        // o utilizar una biblioteca específica para ello
        // ...

        // Ejemplo de un cálculo simple (debes adaptarlo según tu necesidad)
        $suma = 0;
        $factor = 2;

        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $suma += $factor * $numero[$i];
            $factor = ($factor == 7) ? 2 : $factor + 1;
        }

        $resto = $suma % 11;
        $dv = ($resto == 0) ? 0 : 11 - $resto;

        return ($dv == 10) ? 'K' : $dv;
    }


    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $rut = $this->validateAndFormatRut($request->rut);

        // Resto del código para crear el usuario
        $user = User::create(array_merge($request->validated(), ['rut' => $rut]));

        return redirect('/login')->with('success', "{$user->nombre}, ya puedes iniciar sesión");
    }

    
}
