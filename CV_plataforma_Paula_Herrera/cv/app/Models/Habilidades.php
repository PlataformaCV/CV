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