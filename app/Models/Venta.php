<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    protected $fillable = ['id_admin_rut', 'id_cliente_rut', 'fecha', 'total', 'estado', 'num_envio', 'id_courier'];
    // Resto de tus propiedades y métodos si es necesario

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin_rut', 'rut');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente_rut', 'rut');
    }

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'num_envio', 'num_envio');
    }

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'id_courier', 'id_courrier');
    }

    public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta', 'id_venta');
    }
}
