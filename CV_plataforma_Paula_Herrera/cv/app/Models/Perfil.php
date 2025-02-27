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
        'sitio_web',
        'sitio_web',
        'linkedin',
        'github'
    ];

public function usuario()
    {
    return $this->belongsTo(User::class, 'usuario_id');
    }
}


// use cv;
// INSERT INTO perfiles (usuario_id, nombre_completo, profesion, descripcion, telefono, email, sitio_web, linkedin, github, created_at, updated_at) VALUES
// (1, 'Juan Pérez', 'Desarrollador Web', 'Soy un apasionado por la tecnología y el desarrollo de software.', '555-1234', 'juanperez@example.com', 'https://juanperez.dev', 'https://linkedin.com/in/juanperez', 'https://github.com/juanperez', NOW(), NOW());
