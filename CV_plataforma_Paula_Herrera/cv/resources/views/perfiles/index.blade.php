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

</style>

<div class="container mx-auto px-4">
    <!-- Menú de navegación -->
    <nav class="menu">
        <a href="{{ route('perfiles.index') }}">Perfil</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
    </nav>
    <br>    
    <h1 class="text-3xl font-semibold mb-6 text-center">Lista de Perfiles</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar un perfil -->
    <div class="text-center mb-6">
        <a href="{{ route('perfiles.create') }}">
            <x-primary-button class="bg-blue-500 hover:bg-blue-600">Agregar un nuevo CV</x-primary-button>
        </a>
    </div>

    {{-- Visualización de perfiles --}}
    <div class=" grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($perfiles as $perfil)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <h3 class="text-xl font-semibold">{{ $perfil->nombre_completo }}</h3>
                    <span class="text-sm text-gray-500">{{ $perfil->profesion }}</span>
                </div>

                <!-- propiedades del perfil -->
                <div class="mb-4">
                    <strong class="text-gray-700">Profesión:</strong>
                    <p>{{ $perfil->profesion  }}</p>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Descripción:</strong>
                    <p>{{ $perfil->sobre_mi }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Teléfono:</strong>
                    <p>{{ $perfil->telefono }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Email:</strong>
                    <p>{{ $perfil->correo_electronico }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Sitio web:</strong>
                    <p>{{ $perfil->sitio_web }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Linkedin:</strong>
                    <p>{{ $perfil->linkedin }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">GitHub:</strong>
                    <p>{{ $perfil->github }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Usuario:</strong>
                    <p>{{ $perfil->usuario ? $perfil->usuario->name : 'No asignado' }}</p>
                </div>

                <!-- Acciones -->
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('perfiles.edit', $perfil->id) }}" class="bg-blue-500 hover:bg-blue-600"><x-primary-button >Actualizar</x-primary-button ></a>
                    <form action="{{ route('perfiles.destroy', $perfil->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este perfil?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"><x-primary-button >Eliminar</x-primary-button ></button>
                    </form>
                </div>
            </div>
            <br><br>
        @endforeach
    </div>
    {{-- Si no hay perfiles --}}
    @if ($perfiles->isEmpty())
        <p class="text-center text-gray-500">No hay perfiles creados aún.</p>
    @endif
</div>

@endsection
