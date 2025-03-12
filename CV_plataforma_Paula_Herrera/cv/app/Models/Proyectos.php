<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable = [
        'usuario_id',
        'titulo',
        'enlace_proyecto'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function perfil(){
        return $this->belongTo(Perfil::class,'usuario_id');
    }
}

// NSERT INTO proyectos (perfil_id, titulo, descripcion, enlace, created_at, updated_at) VALUES
// (1, 'Sistema de Gestión de Tareas', 'Aplicación web para gestionar tareas con Laravel y Vue.js.', 'https://github.com/juanperez/gestion-tareas', NOW(), NOW()),
// (1, 'Blog Personal', 'Blog desarrollado con Laravel y Tailwind CSS.', 'https://juanperez.dev/blog', NOW(), NOW());
