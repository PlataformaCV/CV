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
        <a href="{{ route('perfiles.show') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
    <br>  
    <h1 class="text-3xl font-semibold mb-6">Listado de formaciones</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

<!-- Para agregar un perfil -->
    <a href="{{route('formaciones.create')}}"><x-primary-button>Agregar formación</x-primary-button></a>

    {{-- Tabla de experiencia --}}
    <div class="">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Institución</th>
                    <th class="px-4 py-2 text-left">Titulo</th>
                    <th class="px-4 py-2 text-left">Fecha inicio</th>
                    <th class="px-4 py-2 text-left">Fecha finalización</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formaciones as $formacion)
                    <tr class="border-t">
                            <td class="px-4 py-2">{{$formacion->usuario->name}}</td>
                        <td class="px-4 py-2">{{ $formacion->institucion }}</td>
                        <td class="px-4 py-2">{{ $formacion->titulo_obtenido }}</td>
                        <td class="px-4 py-2">{{ $formacion->fecha_inicio }}</td>
                        <td class="px-4 py-2">{{ $formacion->fecha_fin }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('formaciones.destroy', $formacion->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta experiencia laboral?')">
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
    @if ($formaciones->isEmpty())
        <p class="text-center text-muted">No hay formaciones creadas aún en nigún usuario.</p>
    @endif
</div>
@endsection
