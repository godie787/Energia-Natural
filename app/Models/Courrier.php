<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    protected $table = 'courrier';
    protected $primaryKey = 'id_courrier';
    protected $fillable = ['nombre', 'direccion', 'fono'];

    public $timestamps = false;
    // Resto de tus propiedades y métodos si es necesario
}
