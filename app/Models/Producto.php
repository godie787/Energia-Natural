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
        'precio_venta',
        'imagen',
        'estado',
    ];

    // Puedes agregar relaciones o métodos adicionales según tus necesidades
}