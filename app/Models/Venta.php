<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'venta';
    protected $fillable = [
        'id_admin_rut',
        'id_cliente_rut',
        'fecha',
        'total',
        'direccion_envio',
        'estado',
        'num_envio', // Agrega este campo a la lista
        // Otros campos...
    ];
    
}
