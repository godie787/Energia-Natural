<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvioVenta extends Model
{
    use HasFactory;

    protected $table = 'envio_venta';
    public $incrementing = true; // Deja que se incremente automáticamente

    protected $fillable = ['id_venta', 'num_envio'];
    // Resto de tus propiedades y métodos si es necesario

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'num_envio', 'num_envio');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta', 'id_venta');
    }
}
