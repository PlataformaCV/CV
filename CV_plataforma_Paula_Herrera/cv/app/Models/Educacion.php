<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    protected $table = 'educaciones';
    protected $fillable = [
        'usuario_id',
        'institucion',
        'titulo_obtenido',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function perfil()
    {
    return $this->belongsTo(Perfil::class, 'usuario_id');
    }
}

// INSERT INTO formacion_academica (perfil_id, institucion, titulo, fecha_inicio, fecha_fin, created_at, updated_at) VALUES
// (1, 'Universidad Nacional', 'Ingeniería en Sistemas', '2015-01-01', '2019-12-15', NOW(), NOW()),
// (1, 'Academia Online', 'Curso Avanzado de Laravel', '2020-05-01', '2020-09-01', NOW(), NOW());
