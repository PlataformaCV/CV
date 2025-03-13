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
    <br>
    <h1 class="text-3xl font-semibold mb-6">Proyectos</h1>

    <!--  Mensajes de éxito -->
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

<!-- Para agregar un perfil -->
    <a href="{{route('proyectos.create')}}"><x-primary-button>Agregar Proyecto</x-primary-button></a>

    {{-- Tabla de Proyectos --}}
    <div class="">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Titulo</th>
                    <th class="px-4 py-2 text-left">Descripcion</th>
                    <th class="px-4 py-2 text-left">Enlace</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr class="border-t">
                            <td class="px-4 py-2">{{$proyecto->usuario->name}}</td>
                        <td class="px-4 py-2">{{ $proyecto->titulo}}</td>
                        <td class="px-4 py-2">{{ $proyecto->descripcion }}</td>
                        <td class="px-4 py-2">{{ $proyecto->enlace_proyecto }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta habilidad?')">
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
    @if ($proyectos->isEmpty())
        <p class="text-center text-muted">No hay habilidades creados aún en nigún usuario.</p>
    @endif
</div>
@endsection
