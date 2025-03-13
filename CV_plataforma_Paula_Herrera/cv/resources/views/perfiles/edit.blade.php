@extends('layouts.app')
@section('content')

<style>
.menu{
    background-color: rgb(44, 76, 76);
    color: white;
    text-align:center;
    width: auto;
    padding:20px;
}

.menu a{
    padding:20px;
}
.menu a:hover{
    color: rgb(44, 76, 76);
    background-color: white;
}

.divperfiles{
    width: 70%;
    margin:auto;

}

.centro{
    text-align:center;
}

</style>
<div class="container mx-auto px-4">
<nav class="menu">
        <a href="{{ route('perfiles.index') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
    <form method="POST" action="{{route('perfiles.update', $perfil->id)}}" class="divperfiles">
        @csrf
        @method('PUT')
        <br>
        <h1 class="text-3xl font-semibold mb-6 centro text-center">EDITAR CV</h1>
        <div>
            <x-input-label for="nombre_completo">Nombre completo</x-input-label>
            <input id="nombre_completo" required name="nombre_completo" type="text" value="{{$perfil->nombre_completo}}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="profesion">Profesión</x-input-label>
            <input id="profesion" required name="profesion" type="text" value="{{$perfil->profesion}}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="sobre_mi">Descripción</x-input-label>
            <textarea id="sobre_mi" required name="sobre_mi" class="block mt-1 w-full" rows="4">{{ $perfil->sobre_mi }}</textarea>

        </div>
        <div>
            <x-input-label for="telefono">Teléfono</x-input-label>
            <input id="telefono" required name="telefono" type="number" value="{{$perfil->telefono}}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="correo_electronico">Email</x-input-label>
            <input id="correo_electronico" required name="correo_electronico" type="email" value="{{$perfil->correo_electronico}}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="web">Sitio web</x-input-label>
            <input id="web" required name="web" type="url" value="{{$perfil->sitio_web}}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="linkedin">Linkedin</x-input-label>
            <input id="linkedin" required name="linkedin" value="{{$perfil->linkedin}}" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="github">GitHub</x-input-label>
            <input id="github" required name="github" type="url" value="{{$perfil->github}}" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Actualizar</x-primary-button>
    </form>
</div>
@endsection