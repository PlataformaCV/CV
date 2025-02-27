@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="">
        @csrf
        @method('PUT')
        <h1>Editar CV</h1>
        <div>
            <x-input-label for="nombre">Nombre completo</x-input-label>
            <input id="nombre" required name="nombre" type="text" value="{}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="profesion">Profesión</x-input-label>
            <input id="profesion" required name="profesion" type="text" value="{}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="descripcion">Descripción</x-input-label>
            <textarea id="descripcion" required name="descripcion" value="{}" class="block mt-1 w-full" rows="4"></textarea>
        </div>
        <div>
            <x-input-label for="telefono">Teléfono</x-input-label>
            <input id="telefono" required name="telefono" type="number" value="{}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="email">Email</x-input-label>
            <input id="email" required name="email" type="email" value="{}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="web">Sitio web</x-input-label>
            <input id="web" required name="web" type="url" value="{}" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="linkedin">Linkedin</x-input-label>
            <input id="linkedin" required name="linkedin" value="{}" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="github">GitHub</x-input-label>
            <input id="github" required name="github" type="url" value="{}" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>
</div>
@endsection