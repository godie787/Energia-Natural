<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria'; 
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nom_categoria', 'descripcion'];
    // Resto de tus propiedades y métodos si es necesario
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria', 'id_categoria');
    }
}