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
    <nav class="menu">
        <a href="{{ route('perfiles.create') }}">Agregar perfil</a>
        <a href="{{route('experiencias.create')}}">Agregar experiencia laboral</a>
        <a href="{{route('formaciones.create')}}">Agregar formación académica</a>
        <a href="{{route('habilidades.create')}}">Agregar habilidades</a>
        <a href="{{ route('perfiles.index') }}">Lista de Perfiles</a>
    </nav>

    <h1 class="text-3xl font-semibold mb-6">Lista de Perfiles</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de Perfiles --}}
    <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg mb-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 text-left">Nombre Completo</th>
                    <th class="px-4 py-2 text-left">Profesión</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2 text-left">Teléfono</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Sitio web</th>
                    <th class="px-4 py-2 text-left">Linkedin</th>
                    <th class="px-4 py-2 text-left">Git Hub</th>
                    <th class="px-4 py-2 text-left">Usuario</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perfiles as $perfil)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $perfil->nombre_completo }}</td>
                        <td class="px-4 py-2">{{ $perfil->profesion }}</td>
                        <td class="px-4 py-2">{{ $perfil->descripcion }}</td>
                        <td class="px-4 py-2">{{ $perfil->telefono }}</td>
                        <td class="px-4 py-2">{{ $perfil->email }}</td>
                        <td class="px-4 py-2">{{ $perfil->sitio_web }}</td>
                        <td class="px-4 py-2">{{ $perfil->linkedin }}</td>
                        <td class="px-4 py-2">{{ $perfil->github }}</td>
                        <td class="px-4 py-2">
                            {{ $perfil->usuario ? $perfil->usuario->name : 'No asignado' }}
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('perfiles.show', $perfil->id) }}" class="text-blue-600 hover:underline mr-2">Ver</a>
                            <a href="{{ route('perfiles.edit', $perfil->id) }}" class="text-yellow-600 hover:underline mr-2">Actualizar</a>
                            <form action="{{ route('perfiles.destroy', $perfil->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este perfil?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Si no hay perfiles --}}
    @if ($perfiles->isEmpty())
        <p class="text-center text-muted">No hay perfiles creados aún.</p>
    @endif
</div>
@endsection
