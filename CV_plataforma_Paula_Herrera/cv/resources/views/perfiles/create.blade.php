@extends('layouts.app')

@section('content')
<style>
    div {
        margin: auto;
        width: auto;
    }
    h1 {
        color: rgb(44, 76, 76);
        font-size: 30px;
        font-weight: bold;
    }
    form {
        width: 30%;
        margin: auto;
    }

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
</style>

<div class="container mx-auto px-4">
    <nav class="menu">
        <a href="{{ route('perfiles.create') }}">Agregar perfil</a>
        <a href="{{route('experiencias.create')}}">Agregar experiencia laboral</a>
        <a href="{{route('formaciones.create')}}">Agregar formación académica</a>
        <a href="{{route('habilidades.create')}}">Agregar habilidades</a>
        <a href="{{ route('perfiles.index') }}">Lista de Perfiles</a>
    </nav>
    <form method="POST" action="{{ route('perfiles.store') }}">
        @csrf
        <h1>RELLENA TU CV</h1>
        <div>
        <select name="usuario_id" id="usuario_id" class="block mt-1 w-full">
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option type="text" value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="nombre">Nombre completo</x-input-label>
            <input id="nombre" required name="nombre" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="profesion">Profesión</x-input-label>
            <input id="profesion" required name="profesion" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="descripcion">Descripción</x-input-label>
            <textarea id="descripcion" required name="descripcion" class="block mt-1 w-full" rows="4"></textarea>
        </div>
        <div>
            <x-input-label for="telefono">Teléfono</x-input-label>
            <input id="telefono" required name="telefono" type="number" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="email">Email</x-input-label>
            <input id="email" required name="email" type="email" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="web">Sitio web</x-input-label>
            <input id="web" required name="web" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="linkedin">Linkedin</x-input-label>
            <input id="linkedin" required name="linkedin" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="github">GitHub</x-input-label>
            <input id="github" required name="github" type="url" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>
</div>

@endsection