<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'nom_usuario'=>'required',
            'password'=>'required',
        ];
    }
    public function getCredentials(){
        $username = $this->get('nom_usuario');
        if($this->isEmail($username)){
            return [
                'correo' =>$username,
                'password'=>$this->get('password'),
            ];
        }
        return $this->only('nom_usuario', 'password');
    }
    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['nom_usuario' =>$value],['nom_usuario' => 'email'])->fails();
    }
}
