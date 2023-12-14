<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalleventa';
    protected $fillable = ['id_venta', 'id_producto', 'cantidad', 'precio'];
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
}
