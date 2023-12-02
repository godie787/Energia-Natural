<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    use HasFactory;
    protected $primaryKey = 'id_producto';
    protected $table = 'producto';
    protected $fillable = [
        'id_categoria',
        'nom_producto',
        'descripcion',
        'rut_admin_creador',
        'precio_venta',
        'imagen',
        'estado',
    ];

    public function adminCreador()
    {
        return $this->belongsTo(User::class, 'rut_admin_creador', 'rut');
    }
}