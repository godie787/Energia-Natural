<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'envio';
    protected $primaryKey = ['num_envio', 'id_courrier'];
    public $incrementing = false; // Indica que no se incrementa automáticamente

    protected $fillable = ['fecha', 'direccion_despacho'];
    // Resto de tus propiedades y métodos si es necesario

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'id_courrier', 'id_courrier');
    }
}
