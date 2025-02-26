<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $fillable = [
        'perfil_id',
        'empresa',
        'puesto',
        'fecha_inicio',
        'fecha_fin',
        'descripcion_actividades'];
}


// INSERT INTO habilidades (perfil_id, habilidad, nivel, created_at, updated_at) VALUES
// (1, 'PHP', 'Avanzado', NOW(), NOW()),
// (1, 'Laravel', 'Avanzado', NOW(), NOW()),
// (1, 'JavaScript', 'Intermedio', NOW(), NOW()),
// (1, 'Vue.js', 'Intermedio', NOW(), NOW()),
// (1, 'SQL', 'Avanzado', NOW(), NOW());
