<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Perfil extends Model
{

    use HasFactory;
    protected $table = 'perfiles';

    protected $fillable = [
        'usuario_id',
        'nombre_completo',
        'profesion',
        'sobre_mi',
        'telefono',
        'correo_electronico',
        'sitio_web',
        'sitio_web',
        'linkedin',
        'github'
    ];

public function usuario()
    {
    return $this->belongsTo(User::class, 'usuario_id');
    }

    
public function formaciones()
{
return $this->hasMany(Educacion::class, 'usuario_id');
}

public function habilidades()
{
    return $this->hasMany(Habilidades::class, 'usuario_id');
}

public function experiencias()
{
    return $this->hasMany(ExperienciaLaboral::class, 'usuario_id');
}

// cuando acceda a perfil quiero que me deje acceder a proyectos

public function proyectos()
{
    return $this->hasMany(Proyectos::class, 'usuario_id');
}


}


// use cv;
// INSERT INTO perfiles (usuario_id, nombre_completo, profesion, descripcion, telefono, email, sitio_web, linkedin, github, created_at, updated_at) VALUES
// (1, 'Juan Pérez', 'Desarrollador Web', 'Soy un apasionado por la tecnología y el desarrollo de software.', '555-1234', 'juanperez@example.com', 'https://juanperez.dev', 'https://linkedin.com/in/juanperez', 'https://github.com/juanperez', NOW(), NOW());
