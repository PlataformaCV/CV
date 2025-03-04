<!-- resources/views/perfiles/create.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    div {
        margin: auto;
        width: auto;
    }
    h1 {
        color: purple;
        font-size: 40px;
        font-weight: bold;
    }
    .block {
        font-size: 17px;
        font-weight: bold;
        width: auto;
    }
    form {
        width: 40%;
        margin: auto;
    }
    button {
        margin-left: 405px;
    }
</style>

<form method="POST" action="{{ route('perfiles.store') }}">
    @csrf
    <h1>RELLENA TU CV</h1>

    <!-- Select para elegir un usuario (primer campo) -->
    <div>
        <x-input-label for="usuario_id">Usuario</x-input-label>
        <select id="usuario_id" name="usuario_id" class="block mt-1 w-full">
            <option value="">Seleccione un usuario</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Nombre completo -->
    <div>
        <x-input-label for="nombre">Nombre completo</x-input-label>
        <input id="nombre" required name="nombre" type="text" class="block mt-1 w-full" />
    </div>
    
    <!-- Profesión -->
    <div>
        <x-input-label for="profesion">Profesión</x-input-label>
        <input id="profesion" required name="profesion" type="text" class="block mt-1 w-full" />
    </div>
    
    <!-- Descripción -->
    <div>
        <x-input-label for="descripcion">Descripción</x-input-label>
        <textarea id="descripcion" required name="descripcion" class="block mt-1 w-full" rows="4"></textarea>
    </div>
    
    <!-- Teléfono -->
    <div>
        <x-input-label for="telefono">Teléfono</x-input-label>
        <input id="telefono" required name="telefono" type="number" class="block mt-1 w-full" />
    </div>
    
    <!-- Email -->
    <div>
        <x-input-label for="email">Email</x-input-label>
        <input id="email" required name="email" type="email" class="block mt-1 w-full" />
    </div>
    
    <!-- Sitio Web -->
    <div>
        <x-input-label for="web">Sitio web</x-input-label>
        <input id="web" required name="web" type="url" class="block mt-1 w-full" />
    </div>
    
    <!-- Linkedin -->
    <div>
        <x-input-label for="linkedin">Linkedin</x-input-label>
        <input id="linkedin" required name="linkedin" type="url" class="block mt-1 w-full" />
    </div>
    
    <!-- GitHub -->
    <div>
        <x-input-label for="github">GitHub</x-input-label>
        <input id="github" required name="github" type="url" class="block mt-1 w-full" />
    </div>

    <x-primary-button type="submit">Agregar</x-primary-button>
</form>
@endsection
