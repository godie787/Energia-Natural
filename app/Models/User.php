<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

     
    protected $table = 'usuario'; // Cambia el nombre de la tabla a 'usuario'
    protected $primaryKey = 'rut';

    protected $fillable = [
        'nom_usuario',
        'nombre',
        'apellido',
        'rut',
        'correo',
        'password',
        'rol', // Agrega el nuevo campo 'rol'
        'fono', // Agrega el nuevo campo 'fono'
        'direccion', // Agrega el nuevo campo 'direccion'
        'direccion_despacho',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $username = 'nom_usuario';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // No necesitamos cifrar la contraseña aquí
        });
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'rut');
    }
    

}

