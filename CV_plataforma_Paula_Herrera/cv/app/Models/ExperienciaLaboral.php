<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    protected $table = 'experiencias';
    protected $fillable = [
        'usuario_id',
        'empresa',
        'puesto',
        'fecha_inicio',
        'fecha_fin',
        'descripcion'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function perfil(){
        return $this->belongsTo(Perfil::class, 'usuario_id');
    }
}


// INSERT INTO experiencias_laboral (perfil_id, empresa, puesto, fecha_inicio, fecha_fin, descripcion_actividades,created_at, updated_at) VALUES
// (1, 'TechCorp', 'Backend Developer', '2020-01-15', '2022-12-30', 'Desarrollo de API REST con Laravel y MySQL.', NOW(), NOW()),
// (2, 'SoftSolutions', 'Full Stack Developer', '2023-01-10', NULL, 'Desarrollo de aplicaciones web con Vue.js y Laravel.', NOW(), NOW());