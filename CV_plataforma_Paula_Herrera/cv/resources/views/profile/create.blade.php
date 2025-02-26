@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar CV</h1>

    <!-- Formulario para cargar el archivo CV -->
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="cv">Cargar CV (PDF, Word, etc.)</label>
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" />
        </div>

        <button type="submit">Subir CV</button>
    </form>

    <!-- O Formulario para agregar detalles del CV como texto -->
    <form method="POST" action="">
        @csrf
        @method('PUT')

        <div>
            <label for="experience">Experiencia Laboral</label>
            <textarea id="experience" name="experience" rows="4"></textarea>
        </div>

        <div>
            <label for="education">Educación</label>
            <textarea id="education" name="education" rows="4"></textarea>
        </div>

        <div>
            <label for="skills">Habilidades</label>
            <textarea id="skills" name="skills" rows="4"></textarea>
        </div>

        <button type="submit">Actualizar CV</button>
    </form>
</div>
@endsection