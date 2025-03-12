<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $fillable = [
        'usuario_id',
        'nombre_habilidad',
        'nivel'
    ];
    public function usuario()
    {
    return $this->belongsTo(User::class, 'usuario_id');
    }

    // relacion que une la tabla habilidades con perfiles para poder usarlo en el index directamente //A habilidades le pertenece 1 perfil
    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'usuario_id');
    }
}


