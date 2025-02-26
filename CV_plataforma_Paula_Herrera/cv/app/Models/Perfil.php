<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo', 
        'profesion', 
        'descripcion',
        'telefono', 
        'email', 
        'redes_sociales', 
        'sitio_web', 
        'usuario_id', 
    ];
    
public function usuario()
    {
    return $this->belongsTo(User::class, 'usuario_id');
    }
}
