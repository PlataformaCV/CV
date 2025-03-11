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

table{
    margin:auto;
}
</style>


<div class="container mx-auto px-4">
    <nav class="menu">
        <a href="{{ route('perfiles.index') }}">Perfil</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
    </nav>

    <h1 class="text-3xl font-semibold mb-6">Experiencias laborales</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

<!-- Para agregar un perfil -->
    <a href="{{route('experiencias.create')}}"><x-primary-button>Agregar experiencia laboral</x-primary-button></a>

    {{-- Tabla de experiencia --}}
    <div class="">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Empresa</th>
                    <th class="px-4 py-2 text-left">Puesto</th>
                    <th class="px-4 py-2 text-left">Fecha inicio</th>
                    <th class="px-4 py-2 text-left">Fecha finalización</th>
                    <th class="px-4 py-2 text-left">Actividades desempeñadas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experiencias as $experiencia)
                    <tr class="border-t">
                            <td class="px-4 py-2">{{$experiencia->usuario->name}}</td>
                        <td class="px-4 py-2">{{ $experiencia->empresa }}</td>
                        <td class="px-4 py-2">{{ $experiencia->puesto }}</td>
                        <td class="px-4 py-2">{{ $experiencia->fecha_inicio }}</td>
                        <td class="px-4 py-2">{{ $experiencia->fecha_fin }}</td>
                        <td class="px-4 py-2">{{ $experiencia->descripcion }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('experiencias.destroy', $experiencia->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta experiencia laboral?')">
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

    {{-- Si no hay usuarios --}}
    @if ($experiencias->isEmpty())
        <p class="text-center text-muted">No hay experiencias laborales creados aún en nigún usuario.</p>
    @endif
</div>
@endsection
