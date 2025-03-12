@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{route('perfiles.update', $perfil->id)}}">
        @csrf
        @method('PUT')
        <h1>Editar CV</h1>
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